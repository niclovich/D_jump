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
        @foreach ($listadoarticulos as $articulos)
            <input type="hidden" id="y" value={{$primerarticulo = $articulos[0]}}>
            <div class="row">
                <h1> Listado  de {{$primerarticulo->categoria_articulo->categoria_nombre}} </h1>
                <div class="glider-contain">
                    <div class="gliderarticulos{{$primerarticulo->categoria_id}}">
                        @foreach ($articulos as $pro)
                            <div class="col-lg-3">
                                <div class="product-card">
                                    <figure class="img-product">
                                        <img class="imgarticulo-product" src="{{ $pro->image_url }}"
                                            alt="Lámpara colgante para salones">
                                        <div class="whishlist">
                                            <img
                                                src="https://raw.githubusercontent.com/Oscar131-maker/product-card-ig/78896b684ef51988fbf51996caa66960051d5700/img/wishlist.svg">
                                        </div>
                                    </figure>

                                    <div class="info-product">
                                        <h3 class="title-product">{{ $pro->articulo_nom }}</h3>
                                        <p class="description">{{ $pro->comercio->comercio_nom }}</p>

                                        <label for="">Precio mayor </label> <span
                                            class="price">${{ $pro->precioxmayor }}</span><br><br>
                                        <label for="">Precio menor</label> <span
                                            class="price">${{ $pro->precioxmenor }}</span>

                                    </div>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->articulo_nom }}" id="name"
                                            name="name">
                                        <input type="hidden" value="{{ $pro->precioxmayor }}" id="price"
                                            name="price">
                                        <input type="hidden" value="{{ $pro->precioxmenor }}" id="price"
                                            name="price">
                                        <input type="hidden" value="{{ $pro->image_url }}" id="img" name="img">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                            <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test"
                                                    title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> agregar al carrito

                                                </button>
                                                <a class="btn btn-secondary btn-sm "href="">Ver</a>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button aria-label="Previous" class="glider-prev" id="glider-prev-articulos{{$primerarticulo->categoria_id}}">«</button>
                    <button aria-label="Next" class="glider-next"     id="glider-next-articulos{{$primerarticulo->categoria_id}}" >»</button>
                    <div role="tablist" class="dots"></div>
                </div>
            </div>
            <br>
        @endforeach
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7244.212286964155!2d-65.41324228742984!3d-24.791818690227206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1668565663045!5m2!1ses-419!2sar"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>

    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="glider.js"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="glider.css">
    <link rel="stylesheet" href="{{ asset('card.css') }}">
@endsection
