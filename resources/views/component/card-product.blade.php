<div class="row p-2 bg-white border rounded">
    <div class="col-md-3 mt-1">
        <img class="img-fluid img-responsive rounded product-image" src="{{ $articulo->image_url }}" style="  margin: 10px;
        padding: 5px;  height : 150px;width: 150px">
    </div>
    <div class="col-md-6 mt-1">
        @if ($n < 3)
            <div class="mt-1 mb-1 spec-1">
                <p class="estadonaranaja">Mas Vendido</p>
            </div>
        @endif
        <h5>{{ $articulo->articulo_nom }}</h5>
        <div class="d-flex flex-row">
            <div class="ratings mr-2">
                <span>
                    <h6 class="mt-0 text-black-50">
                        <i class="fas fa-store"></i><span> </span>
                        {{ $articulo->comercio->comercio_nom }}
                    </h6>
                </span>
            </div>


        </div>
        <div class="mt-1 mb-1 spec-1"><span> Para acceder al precio por mayor , la compra debe ser superior a
                {{ $articulo->cantidadminima }} <br></span></div>
    </div>
    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
        <div class="d-flex flex-row align-items-center">
            <h4 class="mr-1">${{ $articulo->precioxmayor }}</h4><span
                class="strike-text">${{ $articulo->precioxmenor }}</span>
        </div>
        <h6 class="text-success">Envio Gratis </h6>
        <div class="d-flex flex-column mt-4">
            <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $articulo->id }}" id="id" name="id">
                <input type="hidden" value="{{ $articulo->articulo_nom }}" id="name" name="name">
                <input type="hidden" value="{{ $articulo->comercio->comercio_nom }}" id="comercionombre"
                    name="comercionombre">

                <input type="hidden" value="{{ $articulo->comercio->id }}" id="comercioid" name="comercioid">
                <input type="hidden" value="{{ $articulo->precioxmayor }}" id="pricemayor" name="pricemayor">
                <input type="hidden" value="{{ $articulo->precioxmenor }}" id="pricemenor" name="pricemenor">
                <input type="hidden" value="{{ $articulo->precioxmenor }}" id="price" name="price">
                <input type="hidden" value="{{ $articulo->cantidadminima }}" id="cantidadminima"
                    name="cantidadminima">
                <input type="hidden" value="{{ $articulo->image_url }}" id="img" name="img">
                <input type="hidden" value="1" id="quantity" name="quantity">
                <input type="hidden" value={{ Route::currentRouteName() }} id="page" name="page">
                <div class="card-footer" style="background-color: white;">
                    <div class="row  align-items-center">
                        <div class="col text-center">
                            <button class="btn btn-success" title="add to cart" onclick="saveCoords()">
                                <i class="fa fa-shopping-cart"></i>

                            </button>
                        </div>
                        <div class="col text-center">
                            <a class="btn btn-secondary " href="{{ route('articulos.showinico', $articulo) }}">Ver</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
