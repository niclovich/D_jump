<nav
    class="main-header navbar navbar-expand-lg 
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('comercioall') }}">Comercios</a>
            </li>

        </ul>

    </ul>
    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <form class="d-flex" method="GET" action="{{ route('articulos.search') }}">
                <input class="form-control mr-sm-2" value="{{ old('product_search') }}" name="search" type="search"
                    placeholder="Buscar Articulos" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </li>
    </ul>

    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">
        {{-- Custom right links --}}
        @yield('content_top_nav_right')

        {{-- Configured right links --}}

        {{-- User menu link --}}

        <li class="nav-item dropdown " style=" color=black">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
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
                <li class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown"
                        aria-expanded="false">
                        <img class="imagen-user"
                            src="https://raw.githubusercontent.com/Rajacharles/User-Account/master/user.png" alt="">
                        {{ $user = auth()->user()->name }}
                    </a>
                    <div class="menu dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                        <div class="perfil-user ">
                            <img class="imagen-user"
                                src="https://raw.githubusercontent.com/Rajacharles/User-Account/master/user.png"
                                alt="">
                            <p class="text-center">{{ $user = auth()->user()->rol }}</p>
                        </div>
                        <hr>
                        <a href="{{ url('/panel/home') }}" class="dropdown-item">Panel</a>
                        <a href="{{ url('/') }}" class="dropdown-item">Home</a>
                        <a href="{{ route('compras') }}" class="dropdown-item">Mis Compras</a>

                        <div class="dropdown-divider">
                        </div>
                        <div class="text-center">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-danger" type="submit"><i
                                        class="fa-sharp fa-solid fa-door-closed"></i>Logout</button>
                            </form>
                        </div>
                </li>
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

</nav>
