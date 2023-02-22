@extends('adminlte::page')
@section('content_header')
    <h1>Pedidos de compra {{ $pedidos[0]->venta_id }}</h1>
    <hr>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/estadoscolores.css') }}">

@endsection
@section('content')
    <div class='container-fluid'>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        <div class='row'>
            <div class="col-md-12 col-md-offset-1">
                <table id="tabla" class="table table-bordered">
                    <thead class='bg-primary text-while'>
                        <tr>
                            <th>Numo de factura</th>
                            <th>estado</th>
                            <th>total</th>
                            <th>Comercio</th>
                            <th>Fecha creacion</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if (count($pedidos) > 0)
                        <tbody>
                            @foreach ($pedidos as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @switch($item->estado)
                                            @case('Listo')
                                                <p class="estadoverde">Listo</p>
                                            @break

                                            @case('Empaquetando')
                                                <p class="estadoamaralillo">Empaquetando</p>
                                            @break

                                            @case('En Camino')
                                                <p class="estadonaranaja">En Camino</p>
                                            @break

                                            @case('Cancelado')
                                                <p class="estadorojo">Cancelado</p>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>{{ $item->totalpedido }}</td>
                                    <td>{{ $item->comercio->comercio_nom }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('pedidos.show', $item) }}"
                                                class="btn btn-sm btn-primary text-white text-uppercase me-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
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


                </table>

            </div>
        </div>

    </div>
    <!-- Delete Modal HTML -->

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
