@extends('adminlte::page')
@section('title', 'Inicio')

@section('content')
    <div class="container">
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
                {{ session()->get('succes_venta') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"> </span>
                </button>
            </div>
            <a class="btn btn-danger" href="{{ route('pedidos.generate-pdf') }}">Descargar PDF</a>
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
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @if (\Cart::getTotalQuantity() > 0)
                    <h4>{{ \Cart::getTotalQuantity() }} Producto(s) en el carrito</h4><br>
                @else
                    <h4>No Product(s) In Your Cart</h4><br>
                    <a href="/panel/home" class="btn btn-dark">Continue en la tienda</a>
                @endif

                @foreach ($cartCollection as $item)
                    <div class="row">
                        <div class="col-lg-3">

                            <img src="{{ $item->attributes->image }}" class="card-img-top mx-auto"
                                style="height: 150px; width: 150px;display: block;">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b><a href="/shop/{{ $item->attributes->name }}">{{ $item->name }}</a></b><br>
                                <hr>
                                <b>Precio en mayor: </b>${{ $item->attributes->pricemayor }}<br>
                                <b>Precio en menor: </b>${{ $item->attributes->pricemenor }}<br>
                                <hr>
                                <b> Precio:
                                    @if ($item->quantity >= $item->attributes->cantidadminima)
                                </b>${{ $item->price = $item->attributes->pricemayor }}
                            @else
                                </b>${{ $item->price = $item->attributes->pricemenor }}
                @endif

                <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                <b>Comercio </b>{{ $item->attributes->comercio }}<br>

                </p>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <form action="{{ route('cart.update') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                            <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                            <button class="btn btn-secondary btn-sm" style="margin-right: 25px;"><i
                                    class="fa fa-edit"></i></button>
                        </div>
                    </form>
                    <form action="{{ route('cart.remove') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                        <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        @endforeach
        @if (count($cartCollection) > 0)
            <form action="{{ route('cart.clear') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-secondary btn-md">Borrar Carrito</button>
            </form>
        @endif
    </div>
    @if (count($cartCollection) > 0)
        <div class="col-lg-5">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                </ul>
            </div>
            <br><a href="/panel/home" class="btn btn-dark">Continue en la tienda</a>
            <a href={{ route('ventas.armarventa') }} class="btn btn-success">Proceder al Checkout</a>
        </div>
    @endif
    </div>
    <br><br>
    </div>
@endsection
