@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    @role ('vendedor')
        <h1>Ultimos pedidos</h1>
    
    @else
        <h1>Pedidos de ventas {{$pedidos[0]->venta_id}}</h1>
    @endrole
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
                    @role('cliente|admin')
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
                                        <td>{{ $item->comercio->comercio_nom}}</td>
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
                    @else
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
                                                @case('Cancelado')
                                                    <p class="estadorojo">Cancelado</p>
                                                @break
                                            @endswitch
                                        <td>{{ $item->totalpedido }}</td>
                                        <td>{{ $item->comercio->comercio_nom}}</td>

                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('pedidos.show', $item) }}"
                                                    class="btn btn-sm btn-primary text-white text-uppercase me-1">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{ route('pedidos.update', $item) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="estado" id="estado" value="Listo">
                                                    <button type="submit" class="btn btn-success  ">Listo</button>
                                                </form>
                                                <form action="{{ route('pedidos.update', $item) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="estado" id="estado" value="Cancelado">
                                                    <button type="submit" class="btn btn-warning  ">Cancelar</button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                    </form>
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
