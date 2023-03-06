<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Mail\SendMailVenta;
use App\Models\Articulo;
use App\Models\Comercio;
use App\Models\Compra;
use App\Models\Detallepedido;
use App\Models\Pedido;
use App\Models\Venta;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Mail;

class VentaController extends Controller
{
    public function armarventa(Request $request)
    {
        $user = Auth::user();
        $cartArticulos = CartFacade::getContent();

        $cartTotal = CartFacade::getTotal(); // the total with the conditions targeted to "total" applied

        if (is_null($user)) {
            //no esta logeado//
            return redirect()->route('login');
        } else {
            DB::beginTransaction();
            try {
                $venta = Venta::create([
                    'user_id' => $user->id,
                    'estado' => 'Empaquetando',
                    'total' => $cartTotal,
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'address' => $request->address,
                    'address2' => $request->address2,
                    'country' => $request->country,
                    'state' => $request->state,
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
                        $comercioArticulo = $articarrito->attributes->comercioid;
                        if ($comercio == $comercioArticulo) {

                            $articuloac = Articulo::where('id', $articarrito->id)->get()->first();
                            if ($articuloac->stock >= $articarrito->quantity) {
                                $articuloac->stock = $articuloac->stock - $articarrito->quantity;
                                $articuloac->save();
                                Detallepedido::create([
                                    'articulo_id' => $articarrito->id,
                                    'pedido_id' => $pedido->id,
                                    'cantidad' => $articarrito->quantity
                                ]);
                                $pedido->totalpedido = $pedido->totalpedido + CartFacade::get($articarrito->id)->getPriceSum();
                                $pedido->save();
                            } else {
                                DB::rollback();
                                CartFacade::clear();
                                return redirect()->route('cart.index')->with('alert_msg', 'Error cantidad no disponible');
                            }
                        }
                    }
                }
                $mailData = [
                    'factura'=>$venta->id,
                    'nombre' => $venta->firstName,
                    'dirreccion' => $venta->address,
                    'telefono' => "3874199824"
                ];
                Mail::to($user->email)->send(new SendMailVenta($mailData));
                CartFacade::clear();
                DB::commit();
    
                return redirect()->route('cart.index')->with('succes_venta', 'Pago realizado Realizado');
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->route('cart.index')->with('alert_msg', 'Error Vuelva a intentar');
            }
        }
        //controlar stock


    }
    public function index()
    {
        $user = Auth::user();
        if ($user->rol == "cliente") {
            $ventas = Venta::where('user_id', $user->id)->get();
            return view('panel.admin.ventas.index', compact('ventas'));
        } else {
            if ($user->rol == "vendedor") {
                $comercio = Comercio::where('user_id', $user->id)->first();
                $pedidos = Pedido::where('comercio_id', $comercio->id)->get();
                return view('panel.admin.pedidos.index', compact('pedidos'));
            } else {
                $ventas = Venta::get();
                $ventas = $ventas->load('user');
                return view('panel.admin.ventas.index', compact('ventas'));
            }
        }
    }
    public function miscomprasvenedor()
    {
        $user = Auth::user();
        $ventas = Venta::where('user_id', $user->id)->get();
        return view('panel.admin.ventas.indexcliente', compact('ventas'));
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
            $pedidos = Pedido::where('venta_id', $venta->id)->get();
            $pedidos->load('comercio');
            //return $pedidos;
            return view('panel.admin.pedidos.index', compact('pedidos'));
        } else {

            if($user->rol="admin"){
                $pedidos = Pedido::where('venta_id', $venta->id)->get();
                $venta->load('user');
                return view('panel.admin.pedidos.index', compact('pedidos','venta'));
            }
            else{
                $pedidos = Pedido::where('venta_id', $venta->id)->get();
                return view('panel.admin.pedidos.index', compact('pedidos'));
            }
        }
    }

    public function show2(Compra $compra)
    {
        $pedidos = Pedido::where('venta_id', $compra->id)->get();
        $pedidos->load('comercio');
        return view('panel.admin.pedidos.indexcliente', compact('pedidos'));
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
        $estado=$request->get('estado');
        $venta->estado = $estado;
        $venta->save();
        return redirect()->route('ventas.index')->with('success', ' Venta Actualizado' . $venta->id);
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
        $venta = Venta::where('user_id', $user->id)->latest()->get()->first();

        $pedidos = Pedido::where('venta_id', $venta->id)->get();
        $comercios = [];

        $detalle = Detallepedido::where('pedido_id', $pedidos[0]->id)
            ->join('articulos', 'detallepedidos.articulo_id', 'articulos.id')->get();

        $data = [
            'title' => 'Factura',
            'date' => date('m/d/Y'),
            'user' => $user,
            'venta' => $venta,
            'pedidos' => $pedidos
        ];

        $pdf = FacadePdf::loadView('panel.admin.pedidos.pedidos-pdf', $data);

        return $pdf->download('Factura.pdf');
    }
    public function generatePDF2(Venta $venta)
    {
        $venta->load('user');
        $user = $venta->user;
        $pedidos = Pedido::where('venta_id', $venta->id)->get();
        $detalle = [];
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
            'venta' => $venta,
            'pedidos' => $pedidos,
            'detalle' => $detalle
        ];

        $pdf = FacadePdf::loadView('panel.admin.pedidos.pedidos-pdf', $data);

        return $pdf->download('Factura.pdf');
    }
    public function checkout()
    {
        $user = Auth::user();
        if (is_null($user)) {
            //no esta logeado//
            return redirect()->route('login');
        } else {
            //Esta logeado redirecciono a  carrito
            $cartArticulos = CartFacade::getContent();
            return view('checkout.checkout', compact('cartArticulos'));
        }
    }
}
