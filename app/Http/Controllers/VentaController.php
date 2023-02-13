<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Comercio;
use App\Models\Detallepedido;
use App\Models\Pedido;
use App\Models\Venta;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class VentaController extends Controller
{
    public function armarventa()
    {
        $user = Auth::user();
        $cartArticulos = CartFacade::getContent();
        $cartTotal = CartFacade::getTotal(); // the total with the conditions targeted to "total" applied
        //controlar stock
        DB::beginTransaction();
        try {
            $venta = Venta::create([
                'user_id' => $user->id,
                'estado' => 'Empaquetando',
                'total' => $cartTotal
            ]);

            $pedidosComercio = [];
            //obtengo los comercios para armar los pedidos
            foreach ($cartArticulos  as $articarrito) {
                $comercio = $articarrito->attributes->comercioid;
                if (!in_array($comercio, $pedidosComercio)) {
                    array_push($pedidosComercio, $comercio);
                }
            }
            foreach ($pedidosComercio  as $comercio) {
                $pedido = Pedido::create([
                    'comercio_id' => $comercio,
                    'estado' => 'Empaquetando', //Recibido,,En camino,Cancelado,Empaquetando
                    'totalpedido' => 0,
                    'venta_id' => $venta->id
                ]);

                foreach ($cartArticulos  as $articarrito) {
                    $comercioArticulo = $articarrito->attributes->comercio;
                    if ($comercio == $comercioArticulo) {
                        $articuloac = Articulo::where('id', $articarrito->id)->get()->first();
                        if ($articuloac->stock >= $articarrito->quantity) {
                            $articuloac->stock=$articuloac->stock - $articarrito->quantity;
                            $articuloac->save();
                            Detallepedido::create([
                                'articulo_id' => $articarrito->id,
                                'pedido_id' => $pedido->id,
                                'cantidad' => $articarrito->quantity
                            ]);
                            $pedido->totalpedido=CartFacade::get($articarrito->id)->getPriceSum();
                            $pedido->save();
                        } else {
                            DB::rollback();
                            CartFacade::clear();
                            return redirect()->route('cart.index')->with('alert_msg', 'Error cantidad no disponible');
                        }
                    }
                }
            }
            CartFacade::clear();
            DB::commit();
            return redirect()->route('cart.index')->with('succes_venta', 'Pago realizado Realizado');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('cart.index')->with('alert_msg', 'Error Vuelva a intentar');
        }

    }
    public function index()
    {
        $user = Auth::user();
        if($user->rol=="cliente"){
            $ventas = Venta::where('user_id',$user->id)->get();
            return view('panel.admin.ventas.index', compact('ventas'));

        }
        else{
            if($user->rol=="vendedor"){
                $comercio = Comercio::where('user_id',$user->id)->first();
                $pedidos = Pedido::where('comercio_id',$comercio->id)->get(); 
                return view('panel.admin.pedidos.index', compact('pedidos'));
            }
            else{
                $ventas = Venta::get();
                $ventas = $ventas->load('user');
                return view('panel.admin.ventas.index', compact('ventas'));
            }

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        $user = Auth::user();
        if ($user->rol == 'cliente') {
            $pedidos=Pedido::where('venta_id',$venta->id)->get();
            $pedidos->load('comercio');
            //return $pedidos;
            return view('panel.admin.pedidos.index', compact('pedidos'));

        } else {
            $pedidos=Pedido::where('venta_id',$venta->id)->get();
            return view('panel.admin.pedidos.index', compact('pedidos'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
    public function generatePDF()
    {   
        $user = Auth::user();
        $venta = Venta::where('user_id',$user->id)->latest()->get()->first();

        $pedidos=Pedido::where('venta_id',$venta->id)->get();
        $comercios=[];

        $detalle = Detallepedido::where('pedido_id',$pedidos[0]->id)
        ->join('articulos','detallepedidos.articulo_id','articulos.id')->get();
        
        $data = [
            'title' => 'Factura',
            'date' => date('m/d/Y'),
            'user' => $user,
            'venta'=>$venta,
            'pedidos'=>$pedidos
        ];

        $pdf = FacadePdf::loadView('panel.admin.pedidos.pedidos-pdf', $data);

        return $pdf->download('Factura.pdf');
    }
    public function generatePDF2(Venta $venta)
    {   
        $venta->load('user');
        $user = $venta->user;
        $pedidos=Pedido::where('venta_id',$venta->id)->get();
        $detalle=[];
        $pedidos->load('detallepedidos');
        //$pedidos->detallepedidos;
         //$pedidos[0]->detallepedidos[0]->load('articulo');
         //$pedidos[0]->detallepedidos[1]->load('articulo');
         //$pedidos[1]->detallepedidos[0]->load('articulo');

         foreach ($pedidos  as $detallepedios) {
            $detallepedios->detallepedidos->load('articulo');
         }

            
        $data = [
            'title' => 'Factura',
            'date' => date('m/d/Y'),
            'user' => $user,
            'venta'=>$venta,
            'pedidos'=>$pedidos,
            'detalle'=>$detalle
        ];

        $pdf = FacadePdf::loadView('panel.admin.pedidos.pedidos-pdf', $data);

        return $pdf->download('Factura.pdf');
    }
    public function checkout (){
        $cartArticulos = CartFacade::getContent();
        return view('checkout.checkout',compact('cartArticulos'));

    }

}
