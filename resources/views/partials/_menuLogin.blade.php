<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        &nbsp &nbsp&nbsp&nbsp&nbsp&nbspCuenta&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a href="" class="dropdown-item text-dark">@auth {{auth()->user()->name}} @endauth</a>
        <a href="{{route('librery.menu')}}" class="dropdown-item text-dark">Libreria</a>
        <a href="#" class="dropdown-item text-dark" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesion</a>
        <a href="{{route('register')}}" class="dropdown-item text-dark">Registrar</a>

    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
