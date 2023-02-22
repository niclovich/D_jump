@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <h1></h1>
@stop
@section('content')
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantpedios }}</h3>

                        <p>Ventas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cart-arrow-down"></i>
                    </div>
                    <a href="{{ route('ventas.index') }}" class="small-box-footer">Mas info   <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $cantarticulos }}</h3>

                        <p>Articulos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-basket"></i>
                    </div>
                    <a href="{{ route('articulos.index') }}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Articulos en  stock minimo</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <a href="{{ route('articulos.index') }}" class="small-box-footer">Mas info  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{$comercio->comercio_nom}}</h3>

                        <p>Setting</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <a href={{ route('comercios.edit', $comercio) }} class="small-box-footer">Mas info  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
    <!-- Main content -->
    <section class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ventas del mes</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="grafica-ventas-mes"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Grafica Articulos mas vendidos </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="grafica-articulos"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->




            </div>
        </div>
        <div class="alert alert-secondary" role="alert">
            Desde muestra parte te recomendamos estar atentos a las estadistica brindadas por DJUMP
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Categorias Mas vendida de tu comercio</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="grafica-categoria-comercio"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"> Categorias Mas vendida En DJUMP</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="grafica-categoria"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->




            </div>

            <!-- /.col (RIGHT) -->
        </div>
        <div class="row">
            <!-- AREA CHART -->
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ventas por mes</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="grafica-ventas-barras"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->


        </div>
        <!-- /.row -->
    </section>
@endsection
@section('css')

@stop

@section('js')

    <script>
        var color = [
            'rgba(163,221,203,1)',
            'rgba(232,233,161,1)',
            'rgba(230,181,102,1)',
            'rgba(229,112,126,1)',
            'rgba(186, 226, 25, 0.8)',
            'rgba(179, 200, 91, 0.8)',
        ];
        $(document).ready(function() {




            lineaventasdelmes();
            lineaventasarticulo();
            barraventasmes();
            tortaallcategoria();
            tortacategoriacomerc();
        });
        //Grafico de lineas


        function lineaventasarticulo() {
            const labels = ['Enero', 'Febrero', 'Marzo', 'Abril']

            const dataset1 = {
                label: "Dataset 1",
                data: [10, 55, 60, 120],
                borderColor: 'rgba(248, 37, 37, 0.8)',
                fill: false,
                tension: 0.1
            };

            const dataset2 = {
                label: "Dataset 2",
                data: [5, 44, 55, 100],
                borderColor: 'rgba(69, 248, 84, 0.8)',
                fill: false,
                tension: 0.1
            };

            const dataset3 = {
                label: "Dataset 3",
                data: [20, 40, 55, 120],
                borderColor: 'rgba(69, 140, 248, 0.8)',
                fill: false,
                tension: 0.1
            };

            const dataset4 = {
                label: "Dataset 4",
                data: [18, 40, 20, 100],
                borderColor: 'rgba(245, 40, 145, 0.8)',
                fill: false,
                tension: 0.1
            };

            const graph = document.querySelector("#grafica-articulos");

            const data = {
                labels: labels,
                datasets: [dataset1, dataset2, dataset3, dataset4]
            };

            const config = {
                type: 'line',
                data: data,
            };

            new Chart(graph, config);
        }

        function tortacategoriacomerc() {
            var etiquetastortacomercio = [];
            var datacantidadcomercio = [];
            $.ajax({
                url: 'comerciocategorygraphics',
                method: 'get',
                dataType: 'json',
                success: function(respuesta) {
                    respuesta.forEach(element => {
                        etiquetastortacomercio.push(element.categoria_nombre);
                        datacantidadcomercio.push(element.Total);
                    });
                }
            })

            var $graficatorta = document.querySelector("#grafica-categoria-comercio");
            // Las etiquetas son las porciones de la gráfica
            //const etiquetastorta = ["Ventas", "Donaciones", "Trabajos", "Publicidad"]
            // Podemos tener varios conjuntos de datos. Comencemos con uno
            var datosIngresos = {
                data: datacantidadcomercio, // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
                // Ahora debería haber tantos background colors como datos, es decir, para este ejemplo, 4
                backgroundColor: color,
                borderColor: color, // Color del borde
                borderWidth: 1, // Ancho del borde
            };
            new Chart($graficatorta, {
                type: 'pie', // Tipo de gráfica. Puede ser dougnhut o pie
                data: {
                    labels: etiquetastortacomercio,
                    datasets: [
                        datosIngresos,
                        // Aquí más datos...
                    ]
                },
            });

        }

        function tortaallcategoria() {
            //Torta
            var etiquetastorta = [];
            var datacantidad = [];
            $.ajax({
                url: 'allcategorygraphics',
                method: 'get',
                dataType: 'json',
                success: function(respuesta) {
                    respuesta.forEach(element => {
                        etiquetastorta.push(element.categoria_nombre);
                        datacantidad.push(element.Total);
                    });
                }
            })

            var $graficatorta = document.querySelector("#grafica-categoria");
            // Las etiquetas son las porciones de la gráfica
            //const etiquetastorta = ["Ventas", "Donaciones", "Trabajos", "Publicidad"]
            // Podemos tener varios conjuntos de datos. Comencemos con uno
            var datosIngresos = {
                data: datacantidad, // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
                // Ahora debería haber tantos background colors como datos, es decir, para este ejemplo, 4
                backgroundColor: color, // Color de fondo
                borderColor: color,
                borderWidth: 1, // Ancho del borde
            };
            new Chart($graficatorta, {
                type: 'pie', // Tipo de gráfica. Puede ser dougnhut o pie
                data: {
                    labels: etiquetastorta,
                    datasets: [
                        datosIngresos,
                        // Aquí más datos...
                    ]
                },
            });
        }

        function barraventasmes() {
            const $grafica = document.querySelector("#grafica-ventas-barras");
            // Las etiquetas son las que van en el eje X. 

            var etiquetas = [];
            var datacantventas = [];
            $.ajax({
                url: 'ordersshop',
                method: 'get',
                dataType: 'json',
                success: function(respuesta) {
                    respuesta.forEach(element => {
                        etiquetas.push(element.mes);
                        datacantventas.push(element.Total);
                    });
                }
            })
            // Podemos tener varios conjuntos de datos. Comencemos con uno
            const datosVentas2020 = {
                label: "Ventas por mes",
                data: datacantventas, // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
                borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
                borderWidth: 1, // Ancho del borde
            };
            new Chart($grafica, {
                type: 'bar', // Tipo de gráfica
                data: {
                    labels: etiquetas,
                    datasets: [
                        datosVentas2020,
                        // Aquí más datos...
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                    },
                }
            });

        }

        function lineaventasdelmes() {
            const $grafica_venta_mes = document.querySelector("#grafica-ventas-mes");
            // Las etiquetas son las que van en el eje X. 
            var etiquetas_venta_mes = []
            var data_ventasday = []
            $.ajax({
                url: 'comercioorderssday',
                method: 'get',
                dataType: 'json',
                success: function(respuesta) {
                    respuesta.forEach(element => {
                        etiquetas_venta_mes.push(element.day);
                        data_ventasday.push(element.Total);
                    });
                }
            })
            // Podemos tener varios conjuntos de datos. Comencemos con uno
            const datos_ventas_mes = {
                label: "Ventas por mes",
                data: data_ventasday, // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
                borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
                borderWidth: 1, // Ancho del borde
            };
            new Chart($grafica_venta_mes, {
                type: 'line', // Tipo de gráfica
                data: {
                    labels: etiquetas_venta_mes,
                    datasets: [
                        datos_ventas_mes,
                        // Aquí más datos...
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                    },
                }
            });

        }
    </script>



@stop
