@extends('adminlte::page')
@section('content_header')
    <h1></h1>
@stop
@section('content')
    <div class="row " style="height: 950px">
        <!-- multistep form -->
        <form id="msform" action="{{ route('comercios.store') }}" method="POST">
            @csrf
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Datos del comercio</li>
                <li>Cuentenos mas</li>

            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Datos del comercio</h2>
                <h3 class="fs-subtitle">Comercio a nombre de <br> {{ $user->email }}</h3>

                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Nombre
                            Comercio<span class="text-danger"> *</span></label>
                        <input class="inputregistro" type="text"
                            id="comercio_nom" name="comercio_nom" placeholder="Nombre" required>
                    </div>
                </div>
                @error('comercio_nom')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="row justify-content-between text-left">
                    <label class="form-control-label px-3">Ubicacion<span class="text-danger"> *</span></label>
                    <p id="ubicacion"class="text-success">(0,0)</p>
                </div>
                <input class="form-control @error('longitud') is-invalid @enderror" type="hidden" name="longitud"
                    id="longitud" required>
                <input class="form-control @error('latitud') is-invalid @enderror" type="hidden" name="latitud"
                    id="latitud" required>
                <div class="row" style="height: 300px;">

                    <div id="map">
                    </div>
                </div>

                <input type="button" name="next" class="next action-button" value="Next" />

            </fieldset>
            <fieldset class="">
                <h2 class="fs-title">Cuentanos mas</h2>
                <h3 class="fs-subtitle">Comercio a nombre de <br> {{ $user->email }}</h3>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-12 flex-column d-flex">
                        <label class="form-control-label px-3">Direcion del local<span class="text-danger">
                                *</span></label>
                        <input class="inputregistro "type="text" id="direccion" name="direccion" placeholder="direccion" required>

                    </div>
                    @error('comercio_descripcion')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-12 flex-column d-flex">
                        <label class="form-control-label px-3">Descripcion<span class="text-danger">
                                *</span></label>
                        <textarea type="text" rows="2"cols="10" id="comercio_descripcion" name="comercio_descripcion"
                            placeholder="Descripcion Del comercio" required></textarea>
                    </div>
                    @error('comercio_descripcion')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-12 flex-column d-flex">
                        <label class="form-control-label px-3">Horario del<span class="text-danger">
                                *</span></label>
                        <input class="inputregistro" type="text" id="comercio_horario" name="comercio_horario"
                            placeholder="Example : 08:00-14:00" required>

                    </div>
                    @error('comercio_descripcion')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-12 flex-column d-flex">
                        <label class="form-control-label px-3">Telefono<span class="text-danger">
                                *</span></label>
                        <input class="inputregistro" type="text"id="comercio_telefono" name="comercio_telefono" placeholder="Telefono">
                    </div>

                </div>
                <input type="hidden" name="image_url" id="image_url"
                    value="https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg">

                <input type="hidden" name="user_id" id="user_id" value={{ $user->id }}>
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <button type="submit" class="action-button">Registrar </button>

            </fieldset>
        </form>

    </div>



@endsection
@section('css')
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        #map {
            min-width: 100%;
            min-height: 100%;
        }

        .mycluster {
            background: black;
            border-radius: 50%;
            color: white;
            font-weight: bold;
            font-size: 2em;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.1.0/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.1.0/dist/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="{{ asset('css/registrocomercio.css') }}">
   
@stop

@section('js')

    <script>
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches
        var comercio_nom = document.getElementById("comercio_nom");

        $(".next").click(function() {
            if (animating) return false;

            if (comercio_nom.value != null) {
                animating = true;
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //activate next step on progressbar using the index of next_fs
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale current_fs down to 80%
                        scale = 1 - (1 - now) * 0.2;
                        //2. bring next_fs from the right(50%)
                        left = (now * 50) + "%";
                        //3. increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({
                            'transform': 'scale(' + scale + ')',
                            'position': 'absolute'
                        });
                        next_fs.css({
                            'left': left,
                            'opacity': opacity
                        });
                    },
                    duration: 800,
                    complete: function() {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            }

        });

        $(".previous").click(function() {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function() {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });
    </script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script src="https://unpkg.com/leaflet.markercluster@1.1.0/dist/leaflet.markercluster.js"></script>


    <script>
        const defaultPoint = [-24.7892, -65.4106];

        let map = L.map('map').setView(defaultPoint, 16);
        var ubicacioninput = document.getElementById("ubicacion");
        var longitudinput = document.getElementById("longitud");
        var latitudinput = document.getElementById("latitud");
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        map.doubleClickZoom.disable(); // Deshabilitar el doble click para el zoom
        map.setMinZoom(8); // Zoom minimo en el mapa
        var layerGroup = L.layerGroup().addTo(map);

        /* Abrir un popup con latitud y longitud del punto clickeado en el mapa */
        var popup = L.popup();

        var iconOptions = {
            iconUrl: "http://grzegorztomicki.pl/serwisy/pin.png",
            iconSize: [50, 50]
        }
        // Creating a custom icon
        var customIcon = L.icon(iconOptions);


        var markerOptions = {
            title: "MyLocation",
            clickable: true,
            draggable: true,
            icon: customIcon
        }

        function onMapClick(click) {
            layerGroup.clearLayers();

            var coordenada = click.latlng;
            var latitudaux = coordenada.lat; // lat  es una propiedad de latlng
            var longitudaux = coordenada.lng; // lng también es una propiedad de latlng
            var longitud=longitudaux.toFixed(6);
            var latitud = latitudaux.toFixed(6);
            ubicacioninput.innerText = "(" + latitud + "," + longitud + ")";
            longitudinput.setAttribute('value', longitud);
            latitudinput.setAttribute('value', latitud);
            var marker = L.marker([latitud, longitud], markerOptions);
            marker.addTo(layerGroup);



        };
        map.on('click', onMapClick);



        /* Cargando Puntos en el mapa con un Cluster */
    </script>
@endsection
