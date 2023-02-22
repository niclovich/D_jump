@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <h1>Detalle del pedido {{ $detallepedios[0]->pedido_id }}</h1>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/estadoscolores.css') }}">


@endsection
@section('content')
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
                        <th>Num detallepedido</th>
                        <th>Nom Articulo</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                @if (count($detallepedios) > 0)
                    <tbody>
                        @foreach ($detallepedios as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->articulo->articulo_nom }}</td>
                                <td>
                                    @if ($item->cantidad >= $item->articulo->cantidadminima)
                                        {{ $item->articulo->precioxmayor }}
                                    @else
                                        {{ $item->articulo->precioxmenor }}
                                    @endif
                                </td>
                                <td>{{ $item->cantidad }}</td>

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
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
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



@endsection
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