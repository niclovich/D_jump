@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
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
                        <h3>{{ $venta }}</h3>

                        <p>Ventas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cart-arrow-down"></i>
                    </div>
                    <a href="{{ route('ventas.index') }}" class="small-box-footer">Mas info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $producto }}</h3>

                        <p>Articulos Cargados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-basket"></i>
                    </div>
                    <a href="{{ route('articulos.index') }}" class="small-box-footer">Mas info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $users }}</h3>

                        <p>Usuarios Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">Mas info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $comercios }}</h3>

                        <p>Comercios Disponibles</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <a href={{ route('comercios.index') }} class="small-box-footer">Mas info
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
    
    <section class="container">
        <h1>Graficas </h1>
        <hr>
        <div class="alert alert-secondary" role="alert">
            Desde muestra parte te recomendamos estar atentos a las estadistica brindadas por DJUMP
        </div>
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
                        <h3 class="card-title"> Usuarios sobre Cormecios</h3>
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
                            <canvas id="grafica-usercomercios"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->




            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Estados de las ventas</h3>

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
                            <canvas id="grafica-estado"
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




            lineaventasarticulo();
            tortaallcategoria();
            barrallventas();
            lineaventasdelmes();
            barrasestadosventas();

        });
        //Grafico de lineas

        function barrallventas() {
            const $grafica = document.querySelector("#grafica-ventas-barras");
            // Las etiquetas son las que van en el eje X. 

            var etiquetas = [];
            var datacantventas = [];
            $.ajax({
                url: 'allorders',
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

        function lineaventasarticulo() {
            const labels = ['Enero', 'Febrero', 'Marzo']

            const dataset1 = {
                label: "Users",
                data: [10, 20, 23],
                borderColor: 'rgba(248, 37, 37, 0.8)',
                fill: false,
                tension: 0.1
            };
            /*
            var data1=[];
            ver mes1=[];
            $.ajax({
                url: 'allusersformonth',
                method: 'get',
                dataType: 'json',
                success: function(respuesta) {
                    respuesta.forEach(element => {
                        mes1.push(element.month);
                        data1.push(element.Total);
                    });
                }
            })
              var data2=[];
            ver mes2=[];
            $.ajax({
                url: 'allcomerciosformonth',
                method: 'get',
                dataType: 'json',
                success: function(respuesta) {
                    respuesta.forEach(element => {
                        data2.push(element.month);
                        data2.push(element.Total);
                    });
                }
            })

            */
            const dataset2 = {
                label: "Comercios",
                data: [2, 10, 13],

                borderColor: 'rgba(69, 248, 84, 0.8)',
                fill: false,
                tension: 0.1
            };

            const graph = document.querySelector("#grafica-usercomercios");

            const data = {
                labels: labels,
                datasets: [dataset1, dataset2]
            };

            const config = {
                type: 'line',
                data: data,
            };

            new Chart(graph, config);
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

        function lineaventasdelmes() {
            const $grafica_venta_mes = document.querySelector("#grafica-ventas-mes");
            // Las etiquetas son las que van en el eje X. 
            var etiquetas_venta_mes = []
            var data_ventasday = []
            $.ajax({
                url: 'allorderssday',
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
                borderWidth: 2, // Ancho del borde
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

        function barrasestadosventas() {
            const $graficabarraventas = document.querySelector("#grafica-estado");
            // Las etiquetas son las que van en el eje X. 
            const etiquetas = [ "Febrero"]
            // Podemos tener varios conjuntos de datos
            const recibio = {
                label: "Recibido",
                data: [5000],
                backgroundColor: 'rgba(7, 250, 50, 0.8)', // Color de fondo
                borderColor: 'rgba(7, 250, 50, 0.7)', // Color del borde
                borderWidth: 1, // Ancho del borde
            };
            const empaqueado = {
                label: "Empaquetado",
                data: [1000], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
                backgroundColor: 'rgba(247, 255, 3, 0.8)', // Color de fondo
                borderColor: 'rgba(247, 255, 3, 0.7)', // Color del borde
                borderWidth: 1, // Ancho del borde
            };
            const en_camino = {
                label: "En camino",
                data: [1500], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
                backgroundColor: 'rgba(163, 255, 3, 0.8)', // Color de fondo
                borderColor: 'rgba(163, 255, 3, 0.7)', // Color del borde
                borderWidth: 1, // Ancho del borde
            };

            const cancelado = {
                label: "cancelado",
                data: [10], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
                backgroundColor: 'rgba(245, 50, 29, 0.8)', // Color de fondo
                borderColor: 'rgba(245, 50, 29, 0.7)', // Color del borde
                borderWidth: 1, // Ancho del borde
            };

            new Chart($graficabarraventas, {
                type: 'bar', // Tipo de gráfica
                data: {
                    labels: etiquetas,
                    datasets: [
                        recibio,
                        en_camino,
                        empaqueado,
                        cancelado,                     // Aquí más datos...
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
