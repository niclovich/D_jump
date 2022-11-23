@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <h1></h1>
@stop
@section('content')
    @if (session()->has('success_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"> </span>
            </button>
        </div>
    @endif
    @if (session()->has('alert_msg'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session()->get('alert_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"> </span>
            </button>
        </div>
    @endif
    <div class="primer row">
        <div class="col">
            <a href="{{ route('articulos.index') }}">
                <div class="card" style="--color: #89ec5b">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-shopping-basket"></i>
                        </div>
                        <div class="text">
                            <h3>Ariculos</h3>
                            <p>Articulos Cargados </p>
                            <p>{{ $cantarticulos }} </p>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col">
            <a href="{{ route('articulos.index') }}">
                <div class="card" style="--color: #ff0051">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="text">
                            <h3>Sin stock </h3>
                            <p>Articulos En stock minimo</p>
                            <p>0</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('ventas.index') }}">
                <div class="card" style="--color: #eb5ae5">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-cart-arrow-down"></i>
                        </div>
                        <div class="text">
                            <h3>Ventas </h3>
                            <p> Ventas del mes </p>

                            <p>{{ $cantpedios }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href={{ route('comercios.edit', $comercio) }}>
                <div class="card" style="--color: #5b98eb">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="text">
                            <h3>Mi Comercio</h3>
                            <p>Setting</p>
                            <br>
                        </div>
                    </div>
                </div>
            </a>
        </div>


    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

@stop
