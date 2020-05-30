<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('librery.menu')}}">Libreria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-item nav-link text-white {{setActive('home')}}" href="/">Home</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-item nav-link text-white {{setActive('projects.index')}}" href="{{route('projects.index')}}">Portafolio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Inventario
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="" class="dropdown-item text-dark">Productos</a>
                        <a href="" class="dropdown-item text-dark">Marcas</a>
                     </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-item nav-link text-white {{setActive('ventas')}}" href="#">Ventas</a>
                </li>

            </ul>

            @include('partials._MenuLogin')
        </div>
    </nav>

</header>
