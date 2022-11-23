@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Nombre "{{ $user->name }}"</h1>

        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <h2>{{ $user->email }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
