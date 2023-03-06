@extends('layouts.plantilla')
@section('contenido')
    @include('component.glidercategorias')
    <div class="container">
        @if (count($articulos) == 0)
            <br>
            <br>
            <div class="alert alert-warning" role="alert">
                <div class="row">
                    <div class="col-3">
                        <figure>
                            <img src="imagen/error.png" alt="">
                        </figure>
                    </div>
                    <div class="col-9">
                        <h5>Escribí en el buscador lo que querés encontrar.</h5>
                        <hr>
                        <h6><a href="">Navegá por categorías de productos </a> para encontrar el producto que buscás.
                        </h6>
                    </div>
                </div>
            </div>
            <br>
            <br>
        @else
            <div class="row justify-content-end">
                <div class="col-6 ">
                    <div class=>
                        
                    </div>
                </div>
                <div class="col-3 align-self-end">
                    Ordenado Por:
                </div>
                <div class="col-3  align-self-start">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-expanded="false">
                            Mas relevante
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li>
                                <button class="dropdown-item" type="button">
                                    Mayor precio
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    Menor precio
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <p style="display:none">{{ $n = 1 }}</p>
            @foreach ($articulos as $articulo)
                @include('component.card-product')
                <p style="display:none">{{ $n = $n + 1 }}</p>
            @endforeach
            @if ($articulos->count())
                <div class="card-footer">
                    {{ $articulos->links() }}
                </div>
            @endif
            <hr>
        @endif
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="{{ asset('css/categoria.css') }}">
    <link rel="stylesheet" href="{{ asset('card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estadoscolores.css') }}">

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>

    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 6,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    </script>
@stop
