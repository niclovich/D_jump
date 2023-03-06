@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3 class="blue-text"> Edit Articulo : {{ $articulo->articulo_nom }}</h3>
                <div class="card">
                    <form class="form-card" action="{{ route('articulos.update', $articulo) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Nombre
                                    Articulo<span class="text-danger"> *</span></label>
                                <input class="inputregistro" type="text" id="articulo_nom" name="articulo_nom"
                                    value={{ $articulo->articulo_nom }}>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">categoria <span class="text-danger"> *</span></label>
                                <select id="categoria_id" name="categoria_id">
                                    @foreach ($categorias as $item)
                                        @if ($item->id == $articulo->categoria_id)
                                            <option value="{{ $item->id }}" selected>
                                                {{ $item->categoria_nombre . '-' . $item->id }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }} ">
                                                {{ $item->categoria_nombre . '-' . $item->id }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        @error('stock')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        @error('articulo_nom')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class="row justify-content-between text-left">
                            <label for="image" class="col-sm-4 col-form-label">
                                * Imagen
                            </label>
                            <img src={{$articulo->image_url}} id="image_preview" class="img-fluid"
                                style="object-fit: cover; object-position: center;
        height: 200px; width: 100%;">

                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image_url"
                                name="image_url" accept="image/*">
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Descripcion<span class="text-danger">
                                        *</span></label>
                                <textarea type="text" rows="2"cols="10" id="articulo_descripcion" name="articulo_descripcion">{{ $articulo->articulo_descripcion }}</textarea>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Stock
                                    <span class="text-danger"> *</span></label>
                                <input class="inputregistro" type="number" id="stock" name="stock" value={{$articulo->stock}} >
                            </div>
                            @error('articulo_descripcion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <h5 class="text-center mb-4">Precio</h5>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Precio por mayor
                                    <span class="text-danger"> *</span></label>
                                <input class="inputregistro" type="number" id="precioxmayor" name="precioxmayor" min="0"
                                    value="{{ $articulo->precioxmayor }}" step=".01">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Precio por menor <span class="text-danger">
                                        *</span></label>
                                <input  class="inputregistro" type="number" id="precioxmenor" name="precioxmenor" min="0"
                                    value="{{ $articulo->precioxmenor }}" step=".01">
                            </div>

                        </div>
                        @error('precioxmayor')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        @error('precioxmenor')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-success ml-6 text-center">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/registrocomercio.css') }}">

@endsection
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