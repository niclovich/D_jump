<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/userpanel.css') }}">
    <style>
        .navbar-custom {
            background-color: #F2C94C;
            height: 60px;
        }

        .titulo {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 20px;
            padding-block-end: 20px;
            font-family: Ginebra 'PT Sans', Verdana, sans-serif;
        }

        .lineahome {
            background-color: #bd931f;
            color: #bd931f
        }

        .footer-clean {
            padding: 50px 0;
            background-color: #d3d3d3;
            color: #4b4c4d;
        }

        .footer-clean h3 {
            margin-top: 0;
            margin-bottom: 12px;
            font-weight: bold;
            font-size: 16px;
        }

        .footer-clean ul {
            padding: 0;
            list-style: none;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 0;
        }

        .footer-clean ul a {
            color: inherit;
            text-decoration: none;
            opacity: 0.8;
        }

        .footer-clean ul a:hover {
            opacity: 1;
        }

        .footer-clean .item.social {
            text-align: right;
        }

        @media (max-width:767px) {
            .footer-clean .item {
                text-align: center;
                padding-bottom: 20px;
            }
        }

        @media (max-width: 768px) {
            .footer-clean .item.social {
                text-align: center;
            }
        }

        .footer-clean .item.social>a {
            font-size: 24px;
            width: 40px;
            height: 40px;
            line-height: 40px;
            display: inline-block;
            text-align: center;
            border-radius: 50%;
            border: 1px solid #ccc;
            margin-left: 10px;
            margin-top: 22px;
            color: inherit;
            opacity: 0.75;
        }

        .footer-clean .item.social>a:hover {
            opacity: 0.9;
        }

        @media (max-width:991px) {
            .footer-clean .item.social>a {
                margin-top: 40px;
            }
        }

        @media (max-width:767px) {
            .footer-clean .item.social>a {
                margin-top: 10px;
            }
        }

        .footer-clean .copyright {
            margin-top: 14px;
            margin-bottom: 0;
            font-size: 13px;
            opacity: 0.6;
        }

        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
        }

        .colorprincipal {
            background-color: #F2C94C;
        }
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <title>DJUMP</title>
</head>

<body onload="posicionate()" style="background:#F8F8F8">
    <header>
        @include('component.navbar')

    </header>
    <br>
    <br>
    <div class="container-fuild">
        @yield('contenido')

    </div>
    @include('component.fotter')

    <script src="https://kit.fontawesome.com/70d7c8e2d1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    @yield('js')

    <script>
        function saveCoords(e) {
            sessionStorage.setItem("coords", JSON.stringify({
                y: window.scrollY,
                x: window.scrollX
            }));
        }

        function posicionate() {
            var coords = JSON.parse(sessionStorage.getItem("coords"));
            if (coords) {
                window.scrollTo(coords.x, coords.y);
            }
        }

        function ocultarvermas() {
            var x = document.getElementById("button-vermas");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function vermas() {
            var x = document.getElementById("div-vermas");
            if (x.style.display === "none") {
                x.style.display = "flex";
                x.value = "ver menos";
            } else {
                x.style.display = "none";
            }
        }
    </script>

</body>

</html>
