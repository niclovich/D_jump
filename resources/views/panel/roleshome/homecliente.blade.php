@extends('adminlte::page')
@section('content_header')
@stop
@section('content')
    @if (session()->has('success_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    @if (session()->has('alert_msg'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session()->get('alert_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    @if (count($errors) > 0)
        @foreach ($errors0 > all() as $error)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endforeach
    @endif
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h6>Ultimas compras</h6>

                        <p>Mis Compras</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cart-arrow-down"></i>
                    </div>
                    <a href="{{ route('compras') }}" class="small-box-footer">Mas info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h6>Actualzia tus datos</h6>

                        <p>Mi perfil</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-user"></i>
                    </div>
                    <a href="{{ route('settings') }}" class="small-box-footer">Mas info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-3">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h6>Carga tus articulos</h6>
                        <p>Registrar tu propio Comercio</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <a href="{{ route('comercios.create') }}" class="small-box-footer">Mas info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            </div>
            <!-- ./col -->
        </div>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>Segun tus ultimas compras , te recomendamos estos articulos</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="row">
            <div class="glider-contain">
                <div class="glider">
                    @foreach ($articulos as $articulo)
                        <div class="col-2">
                            @include('component.cart-articulomini')
                        </div>
                    @endforeach
                </div>
                <button aria-label="Previous" class="glider-prev" id="glider-prev">«</button>
                <button aria-label="Next" class="glider-next" id="glider-next">»</button>
                <div role="tablist" class="dots"></div>
            </div>

        </div>
        
    </div>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
<link rel="stylesheet" href="{{ asset('card.css') }}">



@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
<script>
    new Glider(document.querySelector('.glider'), {
        slidesToShow: 4,
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
