<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Comercio;
use App\Models\Detallepedido;
use App\Models\Pedido;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PedidoController extends Controller

{
    
    public function armarpedido()
    {
        $user = Auth::user();
        $cartArticulos = CartFacade::getContent();
        $cartTotal = CartFacade::getTotal(); // the total with the conditions targeted to "total" applied
        //controlar stock

        DB::beginTransaction();
        try {
            $pedido = Pedido::create([
                'user_id' => $user->id,
                'estado' => 'Empaquetando',
                'totalpedido' => $cartTotal
            ]);
            foreach ($cartArticulos as $articulo) {
                //falta controlar stock 
                $articuloac = Articulo::where('id', $articulo->id)->get()->first();
                if ($articuloac->stock >= $articulo->quantity) {
                    $articuloac->stock = $articuloac->stock - $articulo->quantity;
                    $articuloac->save();
                    $detallepedio = Detallepedido::create([
                        'articulo_id' => $articulo->id,
                        'pedido_id' => $pedido->id,
                        'cantidad' => $articulo->quantity,
                    ]);
                } else {
                    DB::rollback();
                    CartFacade::clear();
                    return redirect()->route('cart.index')->with('alert_msg', 'Error Vuelva a intentar');
                }
            }
            CartFacade::clear();
            DB::commit();
            return redirect()->route('cart.index')->with('success_msg', 'Pago realizado Realizado');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('cart.index')->with('alert_msg', 'Error Vuelva a intentar');
        }
        //borra el carrito

    }
    public function index()
    {
        $user = Auth::user();
        if ($user->rol == "cliente") {
            $pedidos = Pedido::where('user_id', $user->id)->get();
            $pedidos->load('comercios');
            return view('panel.admin.pedidos.index', compact('pedidos'));
        } else {
            $pedidos = Pedido::get();
            return view('panel.admin.pedidos.index', compact('pedidos'));
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
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $user = Auth::user();
        if ($user->rol == 'cliente') {
            $detallepedios = Detallepedido::join('articulos', 'detallepedidos.articulo_id', 'articulos.id')
                ->where('detallepedidos.pedido_id', $pedido->id)
                ->get();
            return view('panel.admin.detallepedido.index', compact('detallepedios'));
        } else {
            if ($user->rol == 'vendedor') {
                $comercio = Comercio::where('user_id', $user->id)->first();
                $detallepedios = Detallepedido::join('articulos', 'detallepedidos.articulo_id', 'articulos.id')
                    ->where('articulos.comercio_id', $comercio->id)
                    ->where('detallepedidos.pedido_id', $pedido->id)
                    ->get();
                return view('panel.admin.detallepedido.index', compact('detallepedios'));
            }
            else{
                $pedido->load('detallepedidos');
                $detallepedios=$pedido->detallepedidos;
                $detallepedios->load('articulo'); 
                return view('panel.admin.detallepedido.index', compact('detallepedios'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $pedido->estado=$request->get('estado');
        $pedido->save();
        $user = Auth::user();
        if ($user->rol == 'vendedor') {
            return redirect()->route('ventas.index')->with('success', 'Actualizado'.$pedido->id);
        }
        else{
            return redirect()->route('pedidos.index')->with('success', 'Actualizado'.$pedido->id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

}
