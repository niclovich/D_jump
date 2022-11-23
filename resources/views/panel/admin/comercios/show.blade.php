@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')

<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <label for=""><h1>Show Comercio ID: {{$comercio->id}}</h1></label>
            <br>
            @can('cliente')
                <a href="{{ route('comercios.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                    Volver al Listado
                </a>    
            @else
                <a href="{{ route('comercios.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                    Volver al Listado2
                </a>    
            @endcan

        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ $comercio->image_url }}" alt="{{ $comercio->comercio_nom }}" id="image_preview" class="img-fluid"
                            style="object-fit: cover; object-position: center; height: 420px; width: 100%;">
                    </div>
                    <div class="mb-3">
                        <h2>{{ $comercio->comercio_nom }}</h2>
                    </div>
                    <div class="mb-3">
                        <p>{{ $comercio->comercio_descripcion }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Creado por {{ $comercio->user->name }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop