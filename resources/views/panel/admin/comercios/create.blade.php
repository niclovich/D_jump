@extends('adminlte::page')
@section('content_header')
    <h1></h1>
@stop
@section('content')
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Formulario de registro de comercio</h3>
                <p class="blue-text">Comercio a nombre de <br> {{$user->email}}</p>
                <div class="card">
                    <h5 class="text-center mb-4">Forma parte de DJUMP</h5>
                    <form class="form-card" action="{{ route('comercios.store') }}" method="POST">
                        @csrf

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Nombre
                                    Comercio<span class="text-danger"> *</span></label>
                                <input type="text" id="comercio_nom" name="comercio_nom" placeholder="Nombre ">
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Horario <span class="text-danger"> *</span></label>
                                <input type="text" id="comercio_horario" name="comercio_horario" placeholder="Example : 08:00-14:00">
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
                                <textarea type="text" rows="2"cols="10" id="comercio_descripcion" name="comercio_descripcion"
                                    placeholder="Descripcion Del comercio"></textarea>
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
                                <input type="text" id="longitud" name="longitud" placeholder="longitud ">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Latitud <span class="text-danger"> *</span></label>
                                <input type="text" id="latitud" name="latitud" placeholder="latitud">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label class="form-control-label px-3">Telefono<span class="text-danger">
                                        *</span></label>
                                <input type="text"id="comercio_telefono" name="comercio_telefono" placeholder="Telefono">
                            </div>

                        </div>
                        @error('comercio_telefono')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="hidden" name="image_url" id="image_url"
                            value="https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg">
                        
                        <input type="hidden" name="user_id" id="user_id"
                            value={{$user->id}}>
                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
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
