@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
<div class="container-sm">

    <div class="row">
        <div class="col">
            <figure class="img-productshow">
                <img class="imgarticulo-product" src="{{ $articulo->image_url }}" alt="Lámpara colgante para salones">
            </figure>
        </div>
        <div class="col">
            <h3 class="title-product">{{ $articulo->articulo_nom }}</h3>
            <p class="description">{{ $articulo->comercio->comercio_nom }}</p>
            <hr>
            <label for="cantidad">Cantidad minima para acceer a precio por mayor {{ $articulo->cantidadminima }}</label><br>
            <hr>
            <span class="price"><label for="">Precio mayor </label> ${{ $articulo->precioxmayor }}</span>
            <span class="price"><label for="">Precio menor</label> ${{ $articulo->precioxmenor }}</span> <br> <br>
            <hr>
            <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $articulo->id }}" id="id" name="id">
                <input type="hidden" value="{{ $articulo->articulo_nom }}" id="name"
                    name="name">
                <input type="hidden" value="{{ $articulo->comercio_id }}" id="comercio"
                    name="comercio">
                <input type="hidden" value="{{ $articulo->precioxmayor }}" id="pricemayor"
                    name="pricemayor">
                <input type="hidden" value="{{ $articulo->precioxmenor }}" id="pricemenor"
                    name="pricemenor">
                <input type="hidden" value="{{ $articulo->precioxmenor }}" id="price"
                    name="price">
                <input type="hidden" value="{{ $articulo->cantidadminima }}" id="cantidadminima"
                    name="cantidadminima">
                <input type="hidden" value="{{ $articulo->image_url }}" id="img" name="img">
                <input type="number" class="from-control" min="1" value="1" id="quantity" name="quantity"
                    style="width: 70px; margin-right: 10px;">
                <span class="stock"><label for="">disponible </label> {{ $articulo->stock }}</span><br><br>
                <div class="card-footer" style="background-color: white;">
                    <div class="row">
                        <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                            <i class="fa fa-shopping-cart"></i> agregar al carrito
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <h2>Articulos que te pueden interezar</h2>
        <div class="glider-contain">
            <div class="glider">
                @foreach ($articulosrelacioandos as $articulo)
                    <div class="col">
                        <div class="product-card">
                            <figure class="img-product">
                                <img class="imgarticulo-product" src="{{ $articulo->image_url }}"
                                    alt="Lámpara colgante para salones">
                                <div class="whishlist">
                                    <img
                                        src="https://raw.githubusercontent.com/Oscar131-maker/product-card-ig/78896b684ef51988fbf51996caa66960051d5700/img/wishlist.svg">
                                </div>
                            </figure>

                            <div class="info-product">
                                <h3 class="title-product">{{ $articulo->articulo_nom }}</h3>
                                <p class="description">{{ $articulo->comercio->comercio_nom }}</p>

                                <label for="">Precio mayor </label> <span
                                    class="price">${{ $articulo->precioxmayor }}</span><br><br>
                                <label for="">Precio menor</label> <span
                                    class="price">${{ $articulo->precioxmenor }}</span>

                            </div>
                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $articulo->id }}" id="id" name="id">
                                <input type="hidden" value="{{ $articulo->articulo_nom }}" id="name" name="name">
                                <input type="hidden" value="{{ $articulo->precioxmayor }}" id="price" name="price">
                                <input type="hidden" value="{{ $articulo->precioxmenor }}" id="price" name="price">
                                <input type="hidden" value="{{ $articulo->image_url }}" id="img" name="img">
                                <input type="hidden" value="1" id="quantity" name="quantity">
                                <div class="card-footer" style="background-color: white;">
                                    <div class="row">
                                        <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                            <i class="fa fa-shopping-cart"></i> agregar al carrito

                                        </button>
                                        <a class="btn btn-secondary btn-sm "
                                            href="{{ route('articulos.show', $articulo) }}">Ver</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <button aria-label="Previous" class="glider-prev" id="glider-prev">«</button>
            <button aria-label="Next" class="glider-next" id="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>

    </div>
</div>

@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="{{ asset('css/showarticulo.css') }}">
    <link rel="stylesheet" href="{{ asset('card.css') }}">

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 5,
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
