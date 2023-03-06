@extends('layouts.plantilla')
@section('contenido')
    <br>
    <br>
    <div class="container">
        <input type="hidden" value={{ $comercio->longitud }} name="longitud" id="longitud">
        <input type="hidden" value={{ $comercio->latitud }} name="latitud" id="latitud">
        <input type="hidden" value={{ $comercio }} name="comercioid" id="comercioid">
        <input type="hidden" value={{ $comercio->image_url }} name="comercio_imagen" id="comercio_imagen">
        <input type="hidden" value={{ $comercio->comercio_nom }} name="comercio_nom" id="comercio_nom">


        <div class="row">
            <div class="col-4 mt-4 ">
                <div class="card rounded">
                    <figure>
                        <img class="d-block" src={{ $comercio->image_url }} alt=""
                            style="height : 150px;width: 130px">
                    </figure>
                    <span class="mt-4">Informacion</span>
                    <h3 class="mx-auto">{{ $comercio->comercio_nom }}</h3>
                    <h6 class="text-muted mx-auto">{{ $diasregistrados }} dias registrados</h6>


                </div>
                <div class="card">
                    <span>Reputacion</span>
                    <h6>{{ count($articulos) }} Articulos cargados</h6>
                    <h6>{{ $cantventas }} Ventas realizadas</h6>
                    <hr>
                    Ubicación
                    <h6 class="mb-4">Argentina,Salta</h6>
                </div>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-6  mt-4  card">
                        <div class="row ">
                            <div class="col-12">
                                <img class="mx-auto d-block mt-4" src="/imagen/buena-calificacion.png" alt="">
                                <h5 class="text-center mb-4">Buena antencio. <span><i class="icon "><img
                                                src="/imagen/check-mark.png" alt=""></i></span></h5>
                            </div>

                        </div>
                    </div>
                    <div class="col-6 mt-4 card">
                        <div class="row ">
                            <div class="col-12">
                                <img class="mx-auto d-block mt-4 " src="/imagen/enviado.png" alt="">
                                <h5 class="text-center mb-4">Despacha sus productos a tiempo. <span><i class="icon "><img
                                                src="/imagen/check-mark.png" alt=""></i></span></h5>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row" style="height: 350px;">
                    <div id="map">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if (count($articulos) > 0)
            <h2>Articulos del vendedor </h2>

                <div class="glider-contain">
                    <div class="glider">
                        @foreach ($articulos as $articulo)
                            <div class="col">
                                @include('component.cart-articulomini')
                            </div>
                        @endforeach
                    </div>
                    <button aria-label="Previous" class="glider-prev" id="glider-prev">«</button>
                    <button aria-label="Next" class="glider-next" id="glider-next">»</button>
                    <div role="tablist" class="dots"></div>
                </div>
            @else
                <div class="row">
                    <h2>Ester comercio no tiene articulos cargados</h2>

                </div>
            @endif
        </div>
        <a href="{{ route('comercios.show2', $comercio) }}"></a>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="{{ asset('card.css') }}">
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
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
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
            var comercioid = $("#comercioid").val();
            var comercio_imagen = $("#comercio_imagen").val();
            var comercio_nom = $("#comercio_nom").val();
            var latitud = $("#latitud").val();
            var longitud = $("#longitud").val();

            const funny = L.icon({
                iconUrl: "http://grzegorztomicki.pl/serwisy/pin.png",
                iconSize: [50, 58], // size of the icon
                iconAnchor: [20, 58], // changed marker icon position
                popupAnchor: [0, -60], // changed popup position
            });
            var customPopup =
                '<div class="card-popup"> <div class="row"> <img src={{ $comercio->image_url }} class="rounded-circle mx-auto mt-2 " style="width: 50px; height: 50px"> </div>  <div class="row"> <h6 class="mx-auto">{{ $comercio->comercio_nom }}</h6> </div> </div>'
            // specify popup options
            const customOptions = {
                width: "70px", // set max-width
                height: "100px",
                className: "customPopup", // name custom popup
            };

            // create marker object, pass custom icon as option, pass content and options to popup, add to map
            let marker = L.marker([latitud, longitud], {
                icon: funny,
            }).bindPopup(customPopup, customOptions);
            map.addLayer(marker);
        });
    </script>
    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 3,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    </script>
@stop
