@extends('layouts.plantilla')
@section('contenido')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="conteiner-search">
                    <form class="search-bar " method="GET" action="{{ route('comercios.search') }}">
                        <input class="buscar_text" value="{{ request()->get('search') }}" id="search" name="search"
                            placeholder="Busca comercio.." required>
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></i></button>
                    </form>

                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Busca</h5>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container-registrarcomercio">

                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Registra tu comercio</h5>
                    <p>Registrate y inpulsa tus venta</p>
                </div>
            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="conteiner-mapa">


                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Comercios ceracanos </h5>
                        <p>Conoce tus alrededor</p>
                    </div>
                </a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        @if (count($comercios) == 0)
            <br>
            <br>
            <div class="alert alert-warning" role="alert">
                <div class="row">
                    <div class="col-3">
                        <figure>
                            <img src="imagen/error.png" alt="">
                        </figure>
                    </div>
                    <div class="col-9">
                        <h5>Escribí en el buscador lo que querés encontrar.</h5>
                        <hr>
                        <h6><a href="{{ route('comercioall') }}">Navegá por todos los comercios </a> para encontrar lo que
                            buscás.
                        </h6>
                    </div>
                </div>
            </div>
            <br>
            <br>
        @else
            @foreach ($comercios as $comercio)
                @include('component.card-shop')
            @endforeach
        @endif
        <p id="variable"> da</p>
        <div id="map">

        </div>
    </div>

@endsection
@section('js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script src="https://unpkg.com/leaflet.markercluster@1.1.0/dist/leaflet.markercluster.js"></script>


    <script>
        /*
                                                                                                        Documentación:

                                                                                                        https://leafletjs.com/examples/quick-start/

                                                                                                        https://github.com/Leaflet/Leaflet.markercluster#usage

                                                                                                    
                                                                                                    */


        const defaultPoint = [-24.7892, -65.4106];

        let map = L.map('map').setView(defaultPoint, 16);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        map.doubleClickZoom.disable(); // Deshabilitar el doble click para el zoom
        map.setMinZoom(8); // Zoom minimo en el mapa

        /* Abrir un popup con latitud y longitud del punto clickeado en el mapa */
        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);


        /* Cargando Puntos en el mapa con un Cluster */

        // Array de Puntos
        var points = [
            defaultPoint
        ]
        var comercios = '';
        $.ajax({
            url: "{{ route('comercios.data') }}",
            type: "get",
            dataType: 'json',
            async: false,
            success: function(data) {
                comercios = data.comercios;
            }
        });
        let markers = L.markerClusterGroup();
        for (comercio of comercios) {
            const funny = L.icon({
                iconUrl: "http://grzegorztomicki.pl/serwisy/pin.png",
                iconSize: [50, 58], // size of the icon
                iconAnchor: [20, 58], // changed marker icon position
                popupAnchor: [0, -60], // changed popup position
            });
            console.log(comercio.image_url)
            var customPopup =
                '<div  style="width: "300px; height: "300px"><div class="thumb-wrapper"><div class="img-box"><img src="' +
                comercio.image_url + '" class="img-fluid" alt=""></div><div class="thumb-content"><h6>' + comercio
                .comercio_nom + '</h6><p><b>' + comercio.comercio_descripcion +
                '</b></p><a href="#" class="btn btn-primary">Ver</a></div></div></div>';
            // specify popup options
            const customOptions = {
                width: "300px", // set max-width
                height: "200px",
                className: "customPopup", // name custom popup
            };

            // create marker object, pass custom icon as option, pass content and options to popup, add to map
            let marker = L.marker([comercio.latitud, comercio.longitud], {
                    icon: funny,
                })
                .bindPopup(customPopup, customOptions);
            markers.addLayer(marker);

        }
        map.addLayer(markers);
    </script>
@endsection
@section('css')
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        #map {
            min-width: 100%;
            min-height: 100vh;
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
    <link rel="stylesheet" href="{{ asset('css/comercios.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.1.0/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.1.0/dist/MarkerCluster.Default.css" />
@endsection
