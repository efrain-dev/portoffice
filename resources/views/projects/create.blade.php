@extends('layouts/appLibrery')
@section('title','Crear Proyectos')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form method="POST" class="bg-white py-3 px-4 shadow rounded" action="{{route('projects.store')}}">
                    <h1>Crear un nuevo proyecto</h1>
                    <hr>
                    @csrf
                    @include('projects._form')
                    <div class="row">
                        <a href="{{route('projects.index')}}"class="btn btn-warning col-6">Regresar</a>
                        <button type="submit" class="btn btn-primary col-6">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection

