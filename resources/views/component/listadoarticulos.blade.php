    <h1> Disponibles Categoria </h1>
    <div class="row">
        <div class="glider-contain">
            <div class="glider">
                @foreach ($categorias as $item)
                    <a href="{{route('categorias.show',$item)}}">
                        <div class="col">
                            <div class="categoria-card">
                                <figure class="img-categoria">
                                    <img class="imgcategoria" src={{ $item->image_url }}
                                        alt="Lámpara colgante para salones">
                                </figure>

                                <div class="info-categoria">
                                    <h3 class="title-categoria">{{ $item->categoria_nombre }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <button aria-label="Previous" class="glider-prev" id="glider-prev">«</button>
            <button aria-label="Next" class="glider-next" id="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    </div>
    <h1>{{$categoria_nom}}</h1>

    <div class="row">
        @foreach ($articulos as $articulo)
            <div class="col-sm-3">
                @include('component.card-articulo')
            </div>
        @endforeach
    </div>