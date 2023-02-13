<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bg-secondary " style="background-color: #CC1414">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">DJUMP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('comercioall') }}">Comercios</a>
                </li>
            </ul>
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <form class="d-flex" method="GET" action="{{ route('articulos.search') }}">
                        <input class="form-control mr-sm-2" value="{{ old('product_search') }}"  name="search" type="search" placeholder="Buscar Articulos"
                            aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav ">

                <li class="nav-item dropdown " style="padding-left: 100px; color=black">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="badge badge-dark">
                                <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity() }}
                            </span>
                        </a>



                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                        style="width: 450px; border-color: #9DA0A2">
                        <ul class="list-group" style="margin: 20px;">
                            @include('component.cart-drop')
                        </ul>
                    </div>
                </li>
                @if (Route::has('login'))
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                data-toggle="dropdown" aria-expanded="false">
                                Panel
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a href="{{ url('/panel/home') }}" class="dropdown-item">Panel</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </ul>
                        </div>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registro</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>

        </div>
        
    </div>
    
</nav>
