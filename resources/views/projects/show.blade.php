
@extends('layouts/appLibrery')
@section('title',$projects->title)

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <div class="card text-center bg-white py-3 px-3 shadow rounded">
                    <div class="card-header">
                        <h1>{{$projects->title}}</h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-{{setStatus($projects->status)}}">{{$projects->status}}</h5>
                        <p class="card-text">{{$projects->description}}</p>
                        <p class="text-muted">{{$projects->created_at->diffForHumans()}}</p>

                    </div>
                    <div class="card-footer text-muted  d-flex justify-content-between">

                        <a href="{{route('projects.index')}}"class="btn btn-primary px-2">Regresar</a>
                        <div class="btn-group">
                            <a href="{{route('projects.edit',$projects)}}" class="btn btn-success px-2"> Editar</a>
                            <a href="#" class="btn btn-danger px-2" onclick="event.preventDefault();document.getElementById('delete-project').submit();">Eliminar</a>
                        </div>
                    </div>
                </div>
                <form method="POST" id="delete-project" style="display: none;" action="{{route('projects.destroy',$projects)}}">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
    </div>

@endsection
