@extends('adminlte::page')
@section('content_header')
    <h1></h1>
@stop
@section('content')
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Formulario de registro de Articulo</h3>
                <p class="blue-text">Articulo a nombre de <br> {{ $comercio->comercio_nom }}</p>
                <div class="card">
                    <form class="form-card" action="{{ route('articulos.store') }}" method="POST">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Articulo nombre <span class="text-danger">
                                        *</span></label>
                                <input type="text" id="articulo_nom" name="articulo_nom" placeholder="Nombre ">
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Categoria <span class="text-danger"> *</span></label>
                                <select id="categoria_articulo" name="categoria_articulo">
                                    @foreach ($categorias as $item)
                                        <option value="{{ $item->id }}">{{ $item->categoria_nombre . '-' . $item->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        @error('categoria_articulo')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        @error('articulo_nom')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label class="form-control-label px-3">Descripcion<span class="text-danger">
                                        *</span></label>
                                <textarea type="text" rows="2"cols="10" id="articulo_descripcion" name="articulo_descripcion"
                                    placeholder="Descripcion Del articulo"></textarea>
                            </div>
                            @error('articulo_descripcion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row justify-content-between text-left">
                            <img src='https://via.placeholder.com/1024' id="image_preview" class="img-fluid"
                                style="object-fit: cover; object-position: center;
        height: 420px; width: 100%;">
                            <label for="image" class="col-sm-4 col-form-label">
                                * Imagen
                            </label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image_url"
                                name="image_url" accept="image/*">
                        </div>
                        <h5 class="text-center mb-4">Importante</h5>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Stock
                                    <span class="text-danger"> *</span></label>
                                <input type="number" id="stock" name="stock" placeholder="stock ">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Compra minima <span class="text-danger">
                                        *</span></label>
                                <input type="text" id="cantidadminima" name="cantidadminima"
                                    placeholder="Cantidad minima">
                            </div>
                        </div>
                        @error('stock')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        @error('cantidadminima')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Precio por mayor
                                    <span class="text-danger"> *</span></label>
                                <input type="number" id="precioxmayor" name="precioxmayor" min="0" value="1"
                                    step=".01">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Precio por menor <span class="text-danger">
                                        *</span></label>
                                <input type="number" id="precioxmenor" name="precioxmenor" min="0" value="1"
                                    step=".01">
                            </div>

                        </div>
                        @error('precioxmayor')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        @error('precioxmenor')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror


                        <input type="hidden" name="comercio_id" id="comercio_id" value={{ $comercio->id }}>
                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-primary ml-3">Registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="{{ asset('css/registrocomercio.css') }}">
@stop

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const image = document.getElementById('image_url');
            image.addEventListener('change', (e) => {
                const input = e.target;
                const imagePreview = document.querySelector('#image_preview');
                if (!input.files.length) return
                file = input.files[0];
                objectURL = URL.createObjectURL(file);
                imagePreview.src = objectURL;
            });
        });
    </script>
@stop
