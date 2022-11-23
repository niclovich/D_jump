@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
@stop
@section('content')
    <div class="container-sm">
        <div class="primer row">
            <div class="col">
                <a href="{{ route('articulos.index') }}">
                    <div class="card" style="--color: #89ec5b">
                        <div class="content">
                            <div class="icon">
                                <i class="fab fa-product-hunt"></i>
                            </div>
                            <div class="text">
                                <h3>Ariculos</h3>
                                <p>Articulos Cargados </p>
                                <p>Cantidas de articulos {{ $producto }}</p>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col">
                <a href="{{ route('ventas.index') }}">
                    <div class="card" style="--color: #F6F22F">
                        <div class="content">
                            <div class="icon">
                                <i class="fas  fa-shopping-cart"></i>
                            </div>
                            <div class="text">
                                <h3>Ventas </h3>
                                <p>Ventas realizadas</p>
                                <p>Cantidas de ventas {{ $venta }}</p>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('users.index') }}">
                    <div class="card" style="--color: #eb5ae5">
                        <div class="content">
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="text">
                                <h3>Usuarios </h3>
                                <p> Usuario registrados </p>
                                <p>Cantidad de usuarios {{ $user }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('comercios.index') }}">
                    <div class="card" style="--color: #5b98eb">
                        <div class="content">
                            <div class="icon">
                                <i class="fas fa-store"></i>
                            </div>
                            <div class="text">
                                <h3>Comercios</h3>
                                <p> Comercios disponbiles </p>
                                <p>Cantidad comercios {{ $comercio }}</p>
                                <br>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

@stop
