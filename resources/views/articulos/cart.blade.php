@extends('layouts.plantilla')

@section('contenido')
    <br><br>

    <div class="container">
        <div class="row justify-content-center ">
            @if (session()->has('success_msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success_msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"> </span>
                    </button>
                </div>
            @endif
            @if (session()->has('succes_venta'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"> </span>
                    </button>
                    <div class="row">
                        <div class="col-3">
                            <figure>
                                <img src="imagen/check-venta.png" alt="">
                            </figure>
                        </div>
                        <div class="col-9">
                            <h5>Todo Salio Perfecto</h5>
                            <hr>
                            <h6>Podes descargar el comprobante , en breve llegar tu pedido . Gracias!
                            </h6>
                            <a class="btn btn-danger" href="{{ route('pedidos.generate-pdf') }}">Descargar PDF</a>
                        </div>
                    </div>

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
            @if (count($errors) > 0)
                @foreach ($errors0 > all() as $error)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"> </span>
                        </button>
                    </div>
                @endforeach
            @endif

        </div>
        @if (\Cart::getTotalQuantity() == 0)
            <div class="alert alert-primary" role="alert">
                <p>No tienes articulos en el carrito Continua navengando <a href="/">Vuelve a Home</a></p>
            </div>
        @else
            <legend class="scheduler-border">{{ \Cart::getTotalQuantity() }} Producto(s) en el carrito</legend>

            @foreach ($cartCollection as $item)
                <div class="row p-2 bg-white border rounded">
                    <div class="col-md-2 mt-1">
                        <img class="img-fluid img-responsive rounded product-image" src="{{ $item->attributes->image }}"
                            style="  margin: 10px;
                padding: 5px;  height : 150px;width: 150px">
                    </div>
                    <div class="col-md-7 mt-1 container-cart">
                        <h5><a href="{{ route('articulos.showinico', $item->id) }}" data-abc="true">{{ $item->name }} </a>
                        </h5>
                        <div class="d-flex flex-row">
                            <div class="ratings mr-2">
                                <span>
                                    <h6 class="mt-0 text-black-50">
                                        <i class="fas fa-store"></i>
                                        {{ $item->attributes->comercionombre }}
                                    </h6>
                                </span>
                            </div>


                        </div>
                        <div class="mt-1 mb-1 spec-1"><span> Para acceder al precio por mayor , la compra debe ser superior
                                a
                                {{ $item->attributes->cantidadminima }} <br></span>
                            <span>
                                Precio por mayor {{ $item->attributes->pricemayor }} <br>
                                Precio por menor {{ $item->attributes->pricemenor }} <br>
                            </span>
                            <span>
                                <h6 class="mr-1">
                                    Precio c/u
                                    @if ($item->quantity >= $item->attributes->cantidadminima)
                                        </b>${{ $item->price = $item->attributes->pricemayor }}
                                    @else
                                        </b>${{ $item->price = $item->attributes->pricemenor }}
                                    @endif
                                </h6>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 border-left container-cart">
                        <div class="d-flex flex-row  ">
                            <span> </span>
                            <form action="{{ route('cart.update') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <input type="number" class="form-control form-control-sm"
                                        value="{{ $item->quantity }}" id="quantity" name="quantity"
                                        style="width: 70px; margin-right: 10px;">
                                    <button class="btn btn-secondary btn-sm" style="margin-right: 25px;"><i
                                            class="fa fa-edit"></i></button>
                                </div>
                            </form>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                <button type="text" class="btn btn-dark btn-sm" style="margin-right: 10px;"><i
                                        class="fa fa-trash"></i></button>
                            </form>

                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1">
                                <h3 class=" font-weight-semibold">${{ \Cart::get($item->id)->getPriceSum() }}</h3>
                            </h4>
                        </div>
                        <h6 class="text-success">Envio Gratis </h6>

                    </div>
                </div>
            @endforeach
            <div class="row justify-content-end">
                @if (count($cartCollection) > 0)
                    <div class="col-lg-5">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                            </ul>
                        </div>
                        <br><a href="/" class="btn btn-dark">Continue en la tienda</a>
                        <a href={{ route('venta.checkout') }} class="btn btn-success">Proceder al Checkout</a>
                    </div>

            </div>
        @endif
        @endif

        <br>


    </div>
    <br><br><br><br><br>
@endsection


@section('css')
    <style>

    </style>
@endsection
