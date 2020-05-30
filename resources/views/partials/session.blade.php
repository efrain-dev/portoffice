@if(session('sesion'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Todo salio bien!!!</strong> {{session('sesion')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
