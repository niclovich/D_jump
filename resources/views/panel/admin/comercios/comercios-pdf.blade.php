<!DOCTYPE html>
<html>
<head>
    <title>Listadao de Comercios </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>

  
    <table class="table table-bordered">
        <thead class='bg-primary text-while'>
            <tr>
                <th>imagen</th>
                <th>Nombre dueño</th>
                <th>Nombre Comercio </th>
                <th>Horario</th>
                <th>Estado</th>
                <th>Fecha creacion</th>
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
                    <td>{{ $comercio->comercio_horario }}</td>
                    <td>{{ $comercio->estado }}</td>
                    <td>{{ $comercio->created_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
  
</body>
</html>