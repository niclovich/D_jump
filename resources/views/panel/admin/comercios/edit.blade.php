@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <input type="hidden" value={{ $comercio }} name="comercioid" id="comercioid">
    <input type="hidden" value={{ $comercio->image_url }} name="comercio_imagen" id="comercio_imagen">
    <input type="hidden" value={{ $comercio->comercio_nom }} name="comercio_nom" id="comercio_nom">

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3 class="blue-text"> Edit Comercio Nombre: {{ $comercio->comercio_nom }}</h3>
                <div class="card">
                    <form class="form-card" action="{{ route('comercios.update', $comercio) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Nombre
                                    Comercio<span class="text-danger"> *</span></label>
                                <input class="inputregistro" type="text" id="comercio_nom" name="comercio_nom"
                                    value={{ $comercio->comercio_nom }}>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Horario <span class="text-danger"> *</span></label>
                                <input class="inputregistro" type="text" id="comercio_horario" name="comercio_horario"
                                    value={{ $comercio->comercio_horario }}>
                            </div>

                        </div>
                        @error('comercio_horario')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        @error('comercio_nom')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label class="form-control-label px-3">Descripcion<span class="text-danger">
                                        *</span></label>
                                <textarea type="text" rows="2"cols="10" id="comercio_descripcion" name="comercio_descripcion">{{ $comercio->comercio_descripcion }}</textarea>
                            </div>
                            @error('comercio_descripcion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label class="form-control-label px-3">Telefono<span class="text-danger">
                                        *</span></label>
                                <input class="inputregistro" type="text" id="comercio_telefono" name="comercio_telefono"
                                    value="{{ $comercio->comercio_telefono }}">
                            </div>
                        </div>
                        @error('comercio_telefono')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class="row justify-content-between text-left">
                            <label class="form-control-label px-3">Ubicacion<span class="text-danger"> *</span></label>
                            <p id="ubicacion"class="text-success">({{ $comercio->latitud }},{{ $comercio->longitud }})</p>
                        </div>
                        <input type="hidden" value={{ $comercio->longitud }} name="longitud" id="longitud">
                        <input type="hidden" value={{ $comercio->latitud }} name="latitud" id="latitud">
                        <div class="row" style="height: 300px;">

                            <div id="map">
                            </div>
                        </div>
                        <input type="hidden" name="image_url" id="image_url"
                            value="https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg">
                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-success ml-3">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/registrocomercio.css') }}">
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
@endsection
@section('js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script src="https://unpkg.com/leaflet.markercluster@1.1.0/dist/leaflet.markercluster.js"></script>


    <script>
        $(document).ready(function() {
            const defaultPoint = [-24.7892, -65.4106];

            let map = L.map('map').setView(defaultPoint, 16);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            map.doubleClickZoom.disable(); // Deshabilitar el doble click para el zoom
            map.setMinZoom(8); // Zoom minimo en el mapa

            /* Abrir un popup con latitud y longitud del punto clickeado en el mapa */
            /* Cargando Puntos en el mapa con un Cluster */

            // Array de Puntos
            var layerGroup = L.layerGroup().addTo(map);
            var ubicacioninput = document.getElementById("ubicacion");
            var longitudinput = document.getElementById("longitud");
            var latitudinput = document.getElementById("latitud");
            var comercioid = $("#comercioid").val();
            var comercio_imagen = $("#comercio_imagen").val();
            var comercio_nom = $("#comercio_nom").val();
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
            var MyLocation = L.marker([latitudinput.value, longitudinput.value], markerOptions);
            MyLocation.addTo(layerGroup);



            function onMapClick(click) {
                layerGroup.clearLayers();

                var coordenada = click.latlng;
                var latitudaux = coordenada.lat; // lat  es una propiedad de latlng
                var longitudaux = coordenada.lng; // lng también es una propiedad de latlng
                var longitud = longitudaux.toFixed(6);
                var latitud = latitudaux.toFixed(6);
                ubicacioninput.innerText = "(" + latitud + "," + longitud + ")";
                longitudinput.setAttribute('value', longitud);
                latitudinput.setAttribute('value', latitud);
                var marker = L.marker([latitud, longitud], markerOptions);
                marker.addTo(layerGroup);



            };
            map.on('click', onMapClick);

        });
    </script>
@stop
