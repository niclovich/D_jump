@php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
@php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))
@php($password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset'))

@if (config('adminlte.use_route_url', false))
    @php($login_url = $login_url ? route($login_url) : '')
    @php($register_url = $register_url ? route($register_url) : '')
    @php($password_reset_url = $password_reset_url ? route($password_reset_url) : '')
@else
    @php($login_url = $login_url ? url($login_url) : '')
    @php($register_url = $register_url ? url($register_url) : '')
    @php($password_reset_url = $password_reset_url ? url($password_reset_url) : '')
@endif

@extends('layouts.plantilla')
@section('contenido')
    <div id="container">
        <div class="container-login" id="container-login">
            <div class="form-container sign-up-container">
                <form action="{{ $register_url }}" method="post">
                    @csrf
                    <h1>Sign up</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="{{ __('adminlte::adminlte.password') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="{{ __('adminlte::adminlte.retype_password') }}">
            
            
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- Register button --}}
                    <button type="submit"  class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                        <span class="fas fa-user-plus"></span>
                        {{ __('adminlte::adminlte.register') }}
                    </button>
            
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="{{ $login_url }}" method="post">
                    @csrf
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your account</span>

                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="{{ __('adminlte::adminlte.password') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <a href="{{ $password_reset_url }}">Forgot your password?</a>

                    <button>Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Hola de nuevo! </h1>
                        <p>Ingresa tus datos personales y navega</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hola!</h1>
                        <p>¿Aun no estas registrado? Hazlo ahora</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/registrosesion.css') }}">

@endsection
@section('js')
    <script>
                
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container-login');
        var pantalla=localStorage.getItem("pantalla");

        if(pantalla=="signUpButton"){
            container.classList.add("right-panel-active");
        }
        else{
            if(pantalla=="signInButton")
            container.classList.remove("right-panel-active");

        }
    


        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
            localStorage.setItem("pantalla", "signUpButton");

        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
            localStorage.setItem("pantalla", "signInButton");

        });
    </script>
@endsection
