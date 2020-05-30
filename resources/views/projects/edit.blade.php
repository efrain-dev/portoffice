@extends('layouts/appLibrery')
@section('title','Crear Proyectos')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form method="POST" action="{{route('projects.update',$projects)}}" class="text-center bg-white py-3 px-3 shadow rounded">
                    <h1>Editar  proyecto</h1>
                    @csrf @method('PATCH')
                    <hr>
                    @include('projects._form')
                    <div class="d-flex justify-content-between">
                        <a href="{{route('projects.show',$projects)}}"class="btn btn-warning col-4">Regresar</a>
                        <button type="submit" class="btn btn-primary col-4">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

