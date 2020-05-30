    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><img style="width: auto; height: 28px;" src="/img/icono.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
            <a class="nav-item nav-link text-dark "{{setActive('home')}}" href="/">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Nosotros
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                  <a class="nav-item nav-link text-dark  {{setActive('about')}}" href="{{route('about')}}">About</a>
                <a class="nav-item nav-link text-dark {{setActive('contact')}}" href="{{route('contact')}}">Contacto</a>
              </div>
            </li>
          </ul>
            @guest
                <a href="{{route('login')}}"> <input class="btn btn-outline-success my-2 my-sm-0" type="button" value="Login"/></a>
            @else
                @include('partials._MenuLogin')
            @endguest
        </div>
      </nav>

