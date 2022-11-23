@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Setting Usuarios</h3>
                <p class="blue-text">Usuario <br> {{ $user->email }}</p>
                <div class="card">
                    <form class="from-card" action="{{ route('users.update', $user) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Nombre
                                    <span class="text-danger"> *</span></label>
                                <input type="text" id="name" name="name" placeholder="Nombre "
                                    value={{ $user->name }}>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Email <span class="text-danger"> *</span></label>
                                <input type="email" id="email" name="email" placeholder="example@host.com"
                                    value="{{ $user->email }}">
                            </div>

                        </div>
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                        <h5 class="text-center mb-4">Passsword</h5>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">
                                    Actual Password
                                    <span class="text-danger"> *</span></label>
                                <input type="password" id="passwordactual" name="passwordactual" placeholder="">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Nueva Password <span class="text-danger">
                                        *</span></label>
                                <input type="password" id="password" name="password" placeholder="">
                            </div>
                        </div>
                        @error('password')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        @error('passwordactual')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label class="form-control-label px-3">Telefono<span class="text-danger">
                                        *</span></label>
                                <input type="text"id="telefono" name="telefono" placeholder="Telefono">
                            </div>
                        </div>
                        @error('comercio_telefono')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="hidden" name="image_url" id="image_url"
                            value="https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg">

                        <input type="hidden" name="user_id" id="user_id" value={{ $user->id }}>
                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-primary ml-3">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="{{ asset('css/registrocomercio.css') }}">
@stop
