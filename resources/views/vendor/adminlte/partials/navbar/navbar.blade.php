<nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('/home.index') }}">Panel</a>
            </li>
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
                <input class="form-control mr-sm-2" value="{{ old('product_search') }}"  name="search" type="search" placeholder="Buscar Articulos"
                    aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </li>
    </ul>

    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">
        {{-- Custom right links --}}
        @yield('content_top_nav_right')

        {{-- Configured right links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')

        {{-- User menu link --}}
        
        <li class="nav-item dropdown " style=" color=black">
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
        @if(Auth::user())
            @if(config('adminlte.usermenu_enabled'))
                @include('adminlte::partials.navbar.menu-item-dropdown-user-menu')
            @else
                @include('adminlte::partials.navbar.menu-item-logout-link')
            @endif
        @endif

        {{-- Right sidebar toggler link --}}

    </ul>

</nav>
