@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3 class="blue-text"> Edit Comercio Nombre: {{ $comercio->comercio_nom }}</h3>
                <div class="card">
                    <form class="form-card" action="{{ route('comercios.update',$comercio) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Nombre
                                    Comercio<span class="text-danger"> *</span></label>
                                <input type="text" id="comercio_nom" name="comercio_nom"
                                    value={{ $comercio->comercio_nom }}>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Horario <span class="text-danger"> *</span></label>
                                <input type="text" id="comercio_horario" name="comercio_horario"
                                    value={{ $comercio->comercio_horario }}>
                            </div>

                        </div>
                        @error('comercio_horario')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        @error('comercio_nom')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label class="form-control-label px-3">Descripcion<span class="text-danger">
                                        *</span></label>
                                <textarea type="text" rows="2"cols="10" id="comercio_descripcion" name="comercio_descripcion">{{ $comercio->comercio_descripcion }}</textarea>
                            </div>
                            @error('comercio_descripcion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <h5 class="text-center mb-4">Contactos</h5>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Longitud
                                    <span class="text-danger"> *</span></label>
                                <input type="text" id="longitud" name="longitud" value={{ $comercio->longitud }}>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Latitud <span class="text-danger"> *</span></label>
                                <input type="text" id="latitud" name="latitud" value="{{ $comercio->latitud }}">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label class="form-control-label px-3">Telefono<span class="text-danger">
                                        *</span></label>
                                <input type="text"id="comercio_telefono" name="comercio_telefono"
                                    value="{{ $comercio->comercio_telefono }}">
                            </div>
                        </div>
                        @error('comercio_telefono')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="hidden" name="image_url" id="image_url"
                            value="https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg">
                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
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
