@extends('adminlte::page')
@section('content_header')
@stop
@section('content')
    @if (session()->has('success_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    @if (session()->has('alert_msg'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session()->get('alert_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    @if (count($errors) > 0)
        @foreach ($errors0 > all() as $error)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endforeach
    @endif
    <div class="container-sm">
        <div class="primer row"> 
            <div class="col-sm">
                <a href="{{ route('ventas.index') }}">
                    <div class="card" style="--color: #F6F22F">
                        <div class="content">
                            <div class="icon">
                                <i class="fas  fa-shopping-cart"></i>
                            </div>
                            <div class="text">
                                <h3>Mis compras </h3>
                                <p> Compras del mes </p>
                                <p>{{$ventas}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm">
                <a href="{{route('users.edit',$user)}}">
                    <div class="card" style="--color: #eb5ae5">
                        <div class="content">
                            <div class="icon">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="text">
                                <h3>Mi perfil</h3>
                                <p>Setting</p>
                                <br>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm">
                <a href="{{route('comercios.create')}}">
                    <div class="card" style="--color: #5b98eb">
                        <div class="content">
                            <div class="icon">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="text">
                                <h3>Quiero vender</h3 >
                                <p>¿Quieres vender ? Sube y crea tu propio Comercio</p>
                                <br>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <hr>
        @include('component.ventanahome')
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="{{ asset('pedidos.css') }}">
    <link rel="stylesheet" href="{{ asset('card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="{{ asset('glidercliente.js') }}"></script>

@stop
