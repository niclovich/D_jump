@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
@stop

@section('content')
    <div class="container-sm">
        @include('component.listadoarticulos')
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="{{ asset('css/categoria.css') }}">
    <link rel="stylesheet" href="{{ asset('card.css') }}">

@endsection
@section('js')

    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="{{ asset('glidercliente.js') }}"></script>
    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    </script>
@stop
