@extends('layouts.plantilla')
@section('contenido')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container-one";>
                    <form class="search-bar" method="GET" action="{{ route('articulos.search') }}">
                        <input class="buscar_text" value="{{ old('product_search') }}"  name="search" type="search" placeholder="Buscar Articulos"
                            aria-label="Search">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></i></button>
                        </form>
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Busca</h5>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container-second">

                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Registra tu comercio</h5>
                    <p>Registrate y inpulsa tus venta</p>
                </div>
            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="container-third">


                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Comercios ceracanos </h5>
                        <p>Conoce tus alrededor</p>
                    </div>
                </a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <hr class="lineahome">
        <h1>Destacado</h1>
        <hr class="lineahome">


        <div class="row">
            @for ($i = 0; $i < 6; $i++)
                <input type="hidden" value="{{ $articulo = $articulos[$i] }}">
                <div class="col-sm-4">
                    @include('component.cart-articulo')
                    <br>
                </div>
            @endfor
        </div>
        <div id="div-vermas" class="row" style="display: none">
            @for ($j = 6; $j < 18; $j++)
                <input type="hidden" value="{{ $articulo = $articulos[$j] }}">
                <div class="col-sm-4">
                    @include('component.cart-articulo')
                    <br>
                </div>
            @endfor
        </div>
        <div id="button-vermas"class="row align-items-center ">
            <div class="col text-center">
                <a class="btn btn-success btn-lg w-50" onclick="vermas();ocultarvermas();">> ver mas </a>

            </div>

        </div>
        <hr class="lineahome">
    </div>
@endsection

@section('js')
    @yield('js')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcomecarrusel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comercios.css') }}">

    @yield('cs')
    <style>
        .container-one {
            width: 100%;
            min-height: 50vh;
            padding: 5%;
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 70px;
            border-radius: 60px;
            background-image: linear-gradient(rgb(0, 0, 0, 0.5), rgb(0, 0, 0, 0.5)), url('https://abarrotero.com/wp-content/uploads/2018/09/mayoreo_ventas_abarrotero.png');

        }

        .container-second {
            width: 100%;
            min-height: 50vh;
            padding: 5%;
            background-image: linear-gradient(rgb(0, 0, 0, 0.5), rgb(0, 0, 0, 0.5)), url('https://turismo.buenosaires.gob.ar/sites/turismo/files/mercado_san_telmo1500x610_0.jpg');
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 50px;
            border-radius: 60px;

        }

        .container-third {
            width: 100%;
            min-height: 50vh;
            padding: 5%;
            background: url('imagen/inicio3.png');
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 50px;
            border-radius: 60px;

        }
    </style>
@endsection
