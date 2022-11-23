@extends('layouts.plantilla')
@section('contenido')
    <div class="container-sm">
        <div class="row">
            <div class="col-sm-8">
                <div class="glider-contain">
                    <div class="glider">
                        <div class="card-image">
                            <img class="img-glider" src="imagen/image1Edit.jpg" alt="Slider Image">
                        </div>
                        <div class="card-image">
                            <img class="img-glider" src="imagen/image2Edit.jpg" alt="Slider Image">
                        </div>
                        <div class="card-image">
                            <img class="img-glider" src="imagen/image3Edit.jpg" alt="Slider Image">
                        </div>

                    </div>
                    <button aria-label="Previous" class="glider-prev">«</button>
                    <button aria-label="Next" class="glider-next">»</button>
                    <div role="tablist" class="dots"></div>
                </div>
            </div>

            <div class=" offset-sm-1 col-sm-3 ">
                <div class="row">
                    <div class="registrar-card" style="background-color: #eb5ae5">
                        <a href="{{ route('register') }}">
                            <div class="card-content">
                                <h4 class="card-title">
                                    Registro de usuarios
                                </h4>
                                <p class="card-subtitulo">
                                    Quieres comprar , articulos en mayor o menor.Registrate facil y rapido
                                </p>
                            </div>
                        </a>

                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="registrar-card" style="background-color: #5b98eb">
                        <a href="{{ route('register') }}">
                            <div class="card-content">
                                <h4 class="card-title">
                                    Registor de comercio
                                </h4>
                                <p class="card-subtitulo">
                                    ¿Estas buscando publicitar tu comercio ? Registrate
                                </p>
                            </div>
                        </a>

                    </div>
                </div>

            </div>

        </div>
        @include('component.ventanahome')

    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="glider.js"></script>
    @yield('js')

@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="glider.css">
    <link rel="stylesheet" href="{{ asset('card.css') }}">
    @yield('cs')

@endsection
