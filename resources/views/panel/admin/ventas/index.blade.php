@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <h1>Compras del utimo mes</h1>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pedidos.css') }}">


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
                    @role('cliente')
                        <thead class='bg-primary text-while'>
                            <tr>
                                <th>Numo de factura</th>
                                <th>estado</th>
                                <th>total</th>
                                <th>Fecha creacion</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if (count($ventas) > 0)
                            <tbody>
                                @foreach ($ventas as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            @switch($item->estado)
                                                @case('Entregado')
                                                    <p class="estadoverde">Entregado</p>
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
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('ventas.show', $item) }}"
                                                    class="btn btn-sm btn-primary text-white text-uppercase me-1">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form class="form-card" action="{{ route('pedidos.generate2-pdf', $item) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-file-pdf"></i></button></th>
                                                </form>

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
                                <th>Numo de factura</th>
                                <th> Destinatario</th>
                                <th>estado</th>
                                <th>total</th>
                                <th>Fecha creacion</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if (count($ventas) > 0)
                            <tbody>
                                @foreach ($ventas as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            @switch($item->estado)
                                                @case('Entregado')
                                                    <p class="estadoverde">Entregado</p>
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
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('ventas.show', $item) }}"
                                                    class="btn btn-sm btn-primary text-white text-uppercase me-1">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form class="form-card" action="{{ route('pedidos.generate2-pdf', $item) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-file-pdf"></i></button></th>
                                                </form>
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
