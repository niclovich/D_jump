<!DOCTYPE html>
<html>
<head>
    <title>Listadao de Comercios </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>

    <table id="tabla" class="table table-bordered">
        @role('vendedor')
            <thead class='bg-primary text-while'>
                <tr>
                    <th>imagen</th>
                    <th>Nombre Articulo</th>
                    <th>Stock </th>
                    <th>Cateogira</th>
                    <th>Fecha creacion</th>
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
  
</body>
</html>