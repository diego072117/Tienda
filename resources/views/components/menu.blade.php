 {{-- Menu --}}
 {{-- Menu USER --}}
 
 <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">SAGA</a>

        {{-- Hamburguesa --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registro</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->full_name }}
                        </a>
                       
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @role('admin')
                                {{-- Users --}}
                                <a class="dropdown-item" href="{{ route('users') }}">Usuarios</a>

                                <a class="dropdown-item" href="{{ route('products') }}">Productos</a>

                                <a class="dropdown-item" href="{{ route('categories') }}">Categorias</a>
                            @endrole

                            {{-- Logout --}}
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Logout</a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                        </div>

                      
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

 {{-- Menu ADMIN--}}
@role('admin')
<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span></span> <span>SAGA </span></h2>
    </div>
    <!--Secciones-del-tablero-->
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="{{ route('home') }}" class="active"><span class="las la-home"></span>
                <span>Inicio</span></a>
            </li>
            <li>
                <a href="{{ route('users') }}"><span class="las la-stethoscope"></span>
                <span>Usuarios</span></a>
            </li>
            <li>
                <a href="{{ route('products') }}"><span class="las la-user"></span>
                <span>Productos</span></a>
            </li>
            <li>
                <a href="{{ route('categories') }}"><span class="las la-user-injured"></span>
                <span>Categorias</span></a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                </form>
            </li>
         
        </ul>
    </div>
</div>
<div class="main-content">
    <header>
        <h2>
            <span class="las la-bars"></span>  
        </h2>

        <div class="search-wrapper">
            <span class="las la-search"></span>
            <input type="search" placeholder="Buscar aquí" />
        </div>
        <div class="user-wrapper">
            {{-- <img src="img/Avatar.png" width="40px" height="40px" alt=""> --}}
            <div>
                <h4>Administrador</h4>
                <small>{{ Auth::user()->full_name }}</small>
            </div>
        </div>
    </header>


  
</div>
@endrole