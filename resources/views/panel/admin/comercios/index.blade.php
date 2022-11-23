@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <h1>Listado Comercio</h1>
@stop
@section('css')

@endsection
@section('content')
    @if (session()->has('success_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"> </span>
            </button>
        </div>
    @endif
    @if (session()->has('alert_msg'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session()->get('alert_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"> </span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <a href="{{ route('comercios.generate-pdf') }}"
                    class="btn btn-sm btn-danger text-white text-uppercase me-1">
                    Generar Pdf
                </a>
                <a href="{{ route('comercios.export') }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                    Generar Exel
                </a>

            </div>
        </div>
    </div>
    <div class='row'>
        <div class="col-md-12 col-md-offset-1">
            <table id="tabla" class="table table-bordered">
                <thead class='bg-primary text-while'>
                    <tr>
                        <th>imagen</th>
                        <th>Nombre dueño</th>
                        <th>Nombre Comercio </th>
                        <th>Estado</th>
                        <th>Fecha creacion</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comercios as $comercio)
                        <tr>
                            <td>
                                <img src="{{ $comercio->image_url }}" alt="{{ $comercio->comercio_nom }}" class="img-fluid"
                                    style="width: 150px;">
                            </td>
                            <td>{{ $comercio->user->name }}</td>
                            <td>{{ $comercio->comercio_nom }}</td>
                            <td>{{ $comercio->estado }}</td>
                            <td>{{ $comercio->created_at }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('comercios.edit', $comercio) }}"
                                        class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                        <i class='fa fa-edit'></i> Edit

                                    </a>
                                    <button type='button' class="btn btn-danger deleteCategoryBtn"
                                        value="{{ $comercio->id . '+' . $comercio->comercio_nom }}">
                                        <i class='fa fa-trash'></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
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
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee</h4>
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
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('panel/delete-comercios') }}" method="POST">
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
