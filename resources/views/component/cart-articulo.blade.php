<div class="product-card">
    <figure class="img-product">
        <img class="imgarticulo-product" src="{{ $articulo->image_url }}" alt="Lámpara colgante para salones">
    </figure>

    <div class="info-product">

        <div class="about-product text-center mt-2">
            <div>
                <h4>{{ $articulo->articulo_nom }}</h4>
                <h6 class="mt-0 text-black-50">
                    <i class="fas fa-store"></i><span> </span>
                    {{ $articulo->comercio->comercio_nom }}
                </h6>
            </div>
        </div>
        <div class="d-flex justify-content-between total font-weight-bold mt-4"><span>Cantidad
                Minima</span><span>{{ $articulo->cantidadminima }}</span></div>
        <div class="stats mt-2">
            <div class="d-flex justify-content-between p-price"><span>Precio por
                    mayor</span><span>${{ $articulo->precioxmayor }}</span></div>
            <div class="d-flex justify-content-between p-price"><span>Precio por
                    menor</span><span>${{ $articulo->precioxmenor }}</span></div>
        </div>


    </div>
    <form action="{{ route('cart.store') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $articulo->id }}" id="id" name="id">
        <input type="hidden" value="{{ $articulo->articulo_nom }}" id="name" name="name">
        <input type="hidden" value="{{ $articulo->comercio->comercio_nom }}" id="comercionombre" name="comercionombre">

        <input type="hidden" value="{{ $articulo->comercio->id }}" id="comercioid" name="comercioid">
        <input type="hidden" value="{{ $articulo->precioxmayor }}" id="pricemayor" name="pricemayor">
        <input type="hidden" value="{{ $articulo->precioxmenor }}" id="pricemenor" name="pricemenor">
        <input type="hidden" value="{{ $articulo->precioxmenor }}" id="price" name="price">
        <input type="hidden" value="{{ $articulo->cantidadminima }}" id="cantidadminima" name="cantidadminima">
        <input type="hidden" value="{{ $articulo->image_url }}" id="img" name="img">
        <input type="hidden" value="1" id="quantity" name="quantity">
        <input type="hidden" value={{ Route::currentRouteName() }} id="page" name="page">

        <div class="card-footer" style="background-color: white;">
            <div class="row  align-items-center">
                <div class="col text-center">
                    <button class="btn btn-success"  title="add to cart"
                        onclick="saveCoords()">
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
