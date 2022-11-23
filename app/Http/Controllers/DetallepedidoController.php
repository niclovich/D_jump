<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use App\Models\detallepedido;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetallepedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function show(detallepedido $pedido)
    {
       // $pedido->detallepedido();
        return $pedido;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function edit(detallepedido $detallepedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detallepedido $detallepedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(detallepedido $detallepedido)
    {
        //
    }
}
