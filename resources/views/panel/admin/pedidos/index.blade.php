@extends('adminlte::page')
@section('content_header')
    @role('vendedor')
        <h1>
            Ultimos pedidos</h1>
    @else
        <div class="container-fuild">
            <div class=" card row text-center">
                <h5>Detalle de venta</h5>
                <h6>Num Factura: {{$venta->id}} </h6>
                <h6>Estado: @switch($venta->estado)
                        @case('Entregado')
                            <label class="estadoverde">Entregado</label>
                        @break

                        @case('Empaquetando')
                            <label class="estadoamaralillo">Empaquetando</label>
                        @break

                        @case('En Camino')
                            <label class="estadonaranaja">En Camino</label>
                        @break

                        @case('Listo')
                            <label class="estadogris">Listo</label>
                        @break

                        @case('Cancelado')
                            <label class="estadorojo">Cancelado</label>
                        @break
                    @endswitch
                </h6>

            </div>
            <div class="row ">
                <div class=" card col-6 text-center">
                    <h5>Informacion sobre el comprador</h5>
                    <h6>Nombre :{{$venta->firstName}}</h6>
                    <h6>Apellido: {{$venta->lastName}}</h6>
                </div>
                <div class=" card col-6 text-center">
                    <h5>Dirreciones</h5>
                    <h6>Adrres 1 :{{$venta->address}} </h6>
                    <h6>Adrres 2 :{{$venta->address2}}  </h6>

                </div>
            </div>
        </div>
    @endrole
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
                <table id="tabla" class="table table-bordered table-striped">
                    @role('cliente|admin')
                        <thead class='bg-info text-while'>
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
                    @else
                        <thead class='bg-info text-while'>
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
                                        <td>{{ $item->comercio->comercio_nom }}</td>

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
                                                    <button type="submit" class="btn btn-success  "> <i
                                                            class="fas fa-check"></i>
                                                    </button>
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
