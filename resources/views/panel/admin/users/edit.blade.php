@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <p class="blue-text">Usuario <br> {{ $user->email }}</p>
                <div class="card text-center">
                    <form class="from-card" action="{{ route('users.update', $user) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h5 class="text-center mb-4">Setting</h5>

                        <div class="perfil-user ">
                            <img class="imagen-user"
                                src="https://raw.githubusercontent.com/Rajacharles/User-Account/master/user.png"
                                alt="">
                            <p class="text-center">{{ $user->rol }}</p>
                        </div>
                        <hr>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Nombre
                                    <span class="text-danger"> *</span></label>
                                <input class="inputregistro" type="text" id="name" name="name"
                                    placeholder="Nombre " value={{ $user->name }}>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Email <span class="text-danger"> *</span></label>
                                <input class="inputregistro" type="email" id="email" name="email"
                                    placeholder="example@host.com" value="{{ $user->email }}">
                            </div>

                        </div>
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="hidden" id="urlactual" name="urlactual" value={{ Request::path()}}>
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
    <style>


        .perfil-user img {
            height: 50px;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
    </style>
@stop
