@extends('layouts.plantilla')
@section('contenido')
    <hr>
    <div class="container">
        <section class="">
            <form action="{{ route('cart.store') }}" method="POST">

                {{ csrf_field() }}
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center" id="container-show">

                        <div class="col-md-6 contenedor" id="panel-imagen">
                            <img class="card-img-top mb-5 mb-md-0 imagen" src="{{ $articulo->image_url }}" alt="..."
                                width="auto" height="500px"  style="border-radius: 10px"/>
                        </div>
                        <div class="col-md-6">
                            <div id="panel-info">
                                <h1 class="display-5 fw-bolder">{{ $articulo->articulo_nom }}</h1>
                                <p class="lead">{{$articulo->categoria_articulo->categoria_nombre}}</p>

                                <div class="fs-5 mb-5">
                                    <span class="text-decoration-line-through">${{ $articulo->precioxmenor }}</span>
                                    <span>${{ $articulo->precioxmayor }}</span>
                                </div>
                                <p class="lead">{{ $articulo->articulo_descripcion }}</p>
                                <p class="lead">Cantidad minima para acceder al precio por mayor es
                                    {{ $articulo->cantidadminima }}
                                </p>
                                <div class="row fs-5 mb-5">
                                    <div class="col-3">
                                        <p class=" lead" style="padding-top:4%">
                                            Cantidad:
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control text-center me-3"id="quantity"
                                            max={{ $articulo->stock }} name="quantity" type="number" value="1">
                                    </div>

                                    <div class="col-6">
                                        <h6 class="small text-muted" style="padding-top:4%">
                                            (Unidades restante {{ $articulo->stock }}).
                                        </h6>
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $articulo->id }}" id="id" name="id">
                                <input type="hidden" value="{{ $articulo->articulo_nom }}" id="name" name="name">
                                <input type="hidden" value="{{ $articulo->comercio->comercio_nom }}" id="comercionombre"
                                    name="comercionombre">

                                <input type="hidden" value="{{ $articulo->comercio->id }}" id="comercioid"
                                    name="comercioid">
                                <input type="hidden" value="{{ $articulo->precioxmayor }}" id="pricemayor"
                                    name="pricemayor">
                                <input type="hidden" value="{{ $articulo->precioxmenor }}" id="pricemenor"
                                    name="pricemenor">
                                <input type="hidden" value="{{ $articulo->precioxmenor }}" id="price" name="price">
                                <input type="hidden" value="{{ $articulo->cantidadminima }}" id="cantidadminima"
                                    name="cantidadminima">
                                <input type="hidden" value="{{ $articulo->image_url }}" id="img" name="img">
                                <input type="hidden" value="1" id="quantity" name="quantity">
                                <input type="hidden" value="cart.index" id="page" name="page">
                                Saber mas sobre el vendedor <a style="color: black"
                                    href="{{route('comercios.show2',$articulo->comercio_id)}}">{{ $articulo->comercio->comercio_nom }}
                                </a>
                                <div class="row card-footer  justify-content-center">
                                    <button class="btn btn-success" id="agregarbutton" title="add to cart">
                                        <i class="fa fa-shopping-cart"></i> agregar al carrito
                                </div>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
            </form>

        </section>
        <hr>
        <div class="titulo">
            <h1> Articulos que te pueden interesar</h1>
        </div>
        <div class="row">
            <div class="glider-contain">
                <div class="glider">
                    @foreach ($articulosrelacioandos as $articulo)
                        <div class="col-2">
                            @include('component.cart-articulomini')
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
    <link rel="stylesheet" href="{{ asset('css/showproduct.css') }}">
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
