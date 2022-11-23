<!DOCTYPE html>
<html>

<head>
    <title>Listadao de Comercios </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <h2>Factura</h2>

        <div class="row ">

            <div class="col">
                <h5>Facturar a</h5>
                <p>
                    {{$user->name}}
                </p>
            </div>
            <div class="col">
                <h5>Enviar a </h5>
                <p>
                    Barrio Ciudad Valdiva
                    {{$user->email}}
                </p>
            </div>
            <div class="col">
                <h5>Factura  N*:{{$venta->id}}</h5>
                <h5>Fecha : {{$date}}</h5>
            </div>


        </div>

        <hr />
        <div class="row fact-info mt-3">
        </div>

        <div class="row my-5">
            <table class="table table-borderless factura">
                <thead class='bg-primary text-while'>
                    <tr>
                        <th>Numo de pedido</th>
                        <th>Sub Total</th>
                        <th>Comercio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->totalpedido }}</td>
                        <td>{{ $item->comercio->comercio_nom}}</td>
                    </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Total Factura</th>
                        <th>{{$venta->total}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="cond row">
            <div class="col-12 mt-3">
                <h4>Condiciones y formas de pago</h4>
                <p>El pago se debe realizar en un plazo de 15 dias.</p>
                <p>
                    Banco Banreserva
                    <br />
                    IBAN: DO XX 0075 XXXX XX XX XXXX XXXX
                    <br />
                    Código SWIFT: BPDODOSXXXX
                </p>
            </div>
        </div>
    </div>
</body>

</html>
