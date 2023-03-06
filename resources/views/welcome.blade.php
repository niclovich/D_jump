@extends('layouts.plantilla')
@section('contenido')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background-color: #F2C94C">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container-one";>
                    <form class="search-bar" method="GET" action="{{ route('articulos.search') }}">
                        <input class="buscar_text" value="{{ old('product_search') }}" name="search" type="search"
                            placeholder="Buscar Articulos" aria-label="Search">
                        <button class="" type="submit"><i class="fa-solid fa-magnifying-glass"></i></i></button>
                    </form>
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Busca</h5>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container-second">

                </div>
                <a href="{{ route('register') }}">
                    <div class="carousel-caption d-none d-md-block" style="  margin-top: 40%">
                        <h5 class="text-center">Registrate</h5>
                        <p>Compra por mayor </p>
                    </div>
                </a>

            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="container-third">


                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Todos los Metodos de pago</h5>
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
    <div class="row" style="">
        @include('component.panel-indicaciones')
    </div>
    <div class="container ">
        <div class="panel-categoria ">
            <div class="titulo">
                <h1>CATEGORIAS</h1>
                <hr>
            </div>
            <div class="row">
                @include('component.glidercategorias')
            </div>
        </div>
        <div class="panel-articulos">
            <div class="titulo">
                <h1>DESTACADOS</h1>
            </div>
            @if (count($articulos) >= 6)
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
                    @for ($j = 6; $j < count($articulos); $j++)
                        <input type="hidden" value="{{ $articulo = $articulos[$j] }}">
                        <div class="col-sm-4">
                            @include('component.cart-articulo')
                            <br>
                        </div>
                    @endfor
                </div>
                <div id="button-vermas"class="row align-items-center ">
                    <div class="col text-center">
                        <a class="btn btn-success  btn-lg w-50" onclick="vermas();ocultarvermas();">ver mas </a>
                    </div>

                </div>
            @else
                <div class="row">
                    @for ($i = 1; $i < count($articulos); $i++)
                        <input type="hidden" value="{{ $articulo = $articulos[$i] }}">
                        <div class="col-sm-4">
                            @include('component.cart-articulo')
                            <br>
                        </div>
                    @endfor
                </div>
            @endif

        </div>

    </div>
@endsection

@section('js')
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 4,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">

    <link rel="stylesheet" href="{{ asset('card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comercios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categoria.css') }}">

    @yield('cs')
    <style>
        .container-one {
            width: 100%;
            min-height: 70vh;
            padding: 5%;
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 70px;
            background-image: linear-gradient(rgb(0, 0, 0, 0.5), rgb(0, 0, 0, 0.5)), url('https://abarrotero.com/wp-content/uploads/2018/09/mayoreo_ventas_abarrotero.png');

        }

        .container-second {
            width: 100%;
            min-height: 70vh;
            padding: 5%;
            background-image: linear-gradient(rgb(0, 0, 0, 0.5), rgb(0, 0, 0, 0.5)), url('https://turismo.buenosaires.gob.ar/sites/turismo/files/mercado_san_telmo1500x610_0.jpg');
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 50px;

        }

        .container-third {
            width: 100%;
            min-height: 70vh;
            padding: 5%;
            background: url('imagen/inicio3.png');
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 50px;

        }
    </style>
@endsection
