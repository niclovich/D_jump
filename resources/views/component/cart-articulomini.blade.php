<div class="product-card">
    <a href="{{ route('articulos.showinico', $articulo->id) }}">
        <figure class="img-product">
            <img class="imgarticulo-product" src="{{ $articulo->image_url }}" alt="Lámpara colgante para salones">

        </figure>
    </a>
    <div class="info-product">

        <div class="about-product text-center mt-2">
            <div>
                <h4 class="text-truncate  " style="max-width: 200px;">{{ $articulo->articulo_nom }}</h4>
                <h6 class="mt-0 text-black-50">
                    <i class="fas fa-store"></i><span> </span>
                    {{ $articulo->comercio->comercio_nom }}
                </h6>
            </div>
        </div>
        <div class="stats mt-2">
            <div class="d-flex justify-content-between p-price"><span>Precio por
                    mayor</span><span>${{ $articulo->precioxmayor }}</span></div>
            <div class="d-flex justify-content-between p-price"><span>Precio por
                    menor</span><span>${{ $articulo->precioxmenor }}</span></div>
        </div>


    </div>
</div>
