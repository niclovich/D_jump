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
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3></h3>

                        <p>Ventas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cart-arrow-down"></i>
                    </div>
                    <a href="{{ route('ventas.index') }}" class="small-box-footer">Mas info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3></h3>

                        <p>Articulos Cargados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-basket"></i>
                    </div>
                    <a href="{{ route('articulos.index') }}" class="small-box-footer">Mas info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3></h3>

                        <p>Usuarios Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">Mas info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            </div>
            <!-- ./col -->
        </div>
    </div>
@endsection
@section('css')



@stop

@section('js')


@stop
