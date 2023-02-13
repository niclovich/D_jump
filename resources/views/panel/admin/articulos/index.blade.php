@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    @role('vendedor')
        <h1>Listado articulos de {{ $articulos[0]->comercio->comercio_nom }}</h1>
    @else
        <h1>Listado articulos</h1>
    @endrole
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/estadoscolores.css') }}">


@endsection
@section('content')
    <div class="container-fuild">
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
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                @role('vendedor')
                <a class="btn btn-success" href="{{ route('articulos.create') }}"><i
                            class="fa fa-plus">Articulo</i></a>
                @endrole
                <a href="{{ route('articulos.generate-pdf') }}"
                    class="btn btn-sm btn-danger text-white text-uppercase me-1">
                    Generar Pdf 
                </a>
                <a href="{{ route('articulos.export') }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                    Generar Exel 
                </a>

            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        <div class='row'>
            <div class="col-md-12 col-md-offset-1">
                <table id="tabla" class="table table-bordered">
                    @role('vendedor')
                        <thead class='bg-primary text-while'>
                            <tr>
                                <th>imagen</th>
                                <th>Nombre Articulo</th>
                                <th>Stock </th>
                                <th>Cateogira</th>
                                <th>Fecha creacion</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if (count($articulos) > 0)
                            <tbody>
                                @foreach ($articulos as $articulo)
                                    <tr>
                                        <td>
                                            <img src="{{ $articulo->image_url }}" alt="{{ $articulo->articulo_nom }}"
                                                class="img-fluid" style="width: 150px;">
                                        </td>
                                        <td>{{ $articulo->articulo_nom }}</td>
                                        <td>
                                            @if ($articulo->stock < 7)
                                                <p class="estadorojo">{{ $articulo->stock }}</p>
                                            @elseif($articulo->stock >= 7)
                                                <p class="estadoverde">{{ $articulo->stock }}</p>
                                            @endif
                                        </td>
                                        <td>{{ $articulo->categoria_articulo->categoria_nombre }}</td>
                                        <td>{{ $articulo->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('articulos.edit', $articulo) }}"
                                                    class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                                    <i class='fa fa-edit'></i> Edit

                                                </a>
                                                <button type='button' class="btn btn-danger deleteCategoryBtn"
                                                    value="{{ $articulo->id . '+' . $articulo->articulo_nom }}">
                                                    <i class='fa fa-trash'></i> Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Data Found</td>
                            </tr>
                        @endif
                    @else
                        <thead class='bg-primary text-while'>
                            <tr>
                                <th>imagen</th>
                                <th>Nombre Articulo</th>
                                <th>Nombre Comercio </th>
                                <th>Fecha creacion</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if (count($articulos) > 0)
                            <tbody>
                                @foreach ($articulos as $articulo)
                                    <tr>
                                        <td>
                                            <img src="{{ $articulo->image_url }}" alt="{{ $articulo->articulo_nom }}"
                                                class="img-fluid" style="width: 150px;">
                                        </td>
                                        <td>{{ $articulo->articulo_nom }}</td>
                                        <td>{{ $articulo->comercio->comercio_nom }}</td>
                                        <td>{{ $articulo->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('articulos.edit', $articulo) }}"
                                                    class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                                    <i class='fa fa-edit'></i> Edit

                                                </a>
                                                <button type='button' class="btn btn-danger deleteCategoryBtn"
                                                    value="{{ $articulo->id . '+' . $articulo->articulo_nom }}">
                                                    <i class='fa fa-trash'></i> Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Data Found</td>
                            </tr>
                        @endif
                    @endrole

                </table>

            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('panel/delete-articulos') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="comercio_delete_id" id="comercio_id">
                        <label id='lbnombre' for="lbnombre"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@section('js')
    <script src="{{ asset('tabla.js') }}"></script>

    <script>
        var p = document.getElementById('lbnombre');
        $(document).ready(function() {

            $('.deleteCategoryBtn').click(function(e) {
                e.preventDefault();
                var comercio_id = $(this).val();
                var limite = "+"
                var lista = comercio_id.split(limite)
                $('#comercio_id').val(lista[0]);
                p.innerHTML = 'Estas seguro que quieres eliminar a ' + lista[1] + '?'
                $('#deleteModal').modal('show')
            });
        });
    </script>


@endsection

@endsection
