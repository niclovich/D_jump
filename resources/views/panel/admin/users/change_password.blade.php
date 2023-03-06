@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <p class="blue-text">Usuario <br> {{ $user->email }}</p>
                <div class="card">
                    <form class="from-card" action="{{ route('users.updatechange_password') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input class="inputregistro" type="hidden" id="name" name="name" placeholder="Nombre "
                            value={{ $user->name }}>

                        <input class="inputregistro" type="hidden" id="email" name="email">
                        <h5 class="text-center mb-4">Change Password</h5>
                        <div class="perfil-user ">
                            <img class="imagen-user"
                                src="https://raw.githubusercontent.com/Rajacharles/User-Account/master/user.png"
                                alt="">
                            <p class="text-center">{{ $user->rol }}</p>
                        </div>
                        <hr>
                        @if (session()->has('succes'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('succes') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"> </span>
                                </button>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session()->get('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"> </span>
                                </button>
                            </div>
                        @endif
                        <div class="alert alert-primary" role="alert">
                            <p>Aviso:Al confimrar el cambio de password, se enviaria un mail de confirmacion. </p>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">
                                    Nueva Password
                                    <span class="text-danger"> *</span></label>
                                <input class="inputregistro" type="password" id="passwordnueva" name="passwordnueva"
                                    placeholder="">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Confirmar Password <span class="text-danger">
                                        *</span></label>
                                <input class="inputregistro" type="password" id="passwordconfirmar" name="passwordconfirmar"
                                    placeholder="">
                            </div>
                        </div>
                        @error('passwordnueva')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        @error('passwordconfirmar')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror


                        <input class="inputregistro" type="hidden"id="telefono" name="telefono" placeholder="Telefono">

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
