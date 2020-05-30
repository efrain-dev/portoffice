
@extends('layouts/appLibrery')
@section('title',$brands->name)

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <div class="card text-center bg-white py-3 px-3 shadow rounded">
                    <div class="card-header">
                        <h1>{{$brands->name}}</h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-black"><img style="height: 50px; width: auto;" src="{{ $brands->file }}"> </h5>
                        <p class="card-text">{{$brands->description}}</p>
                        <p class="text-muted">Creado {{$brands->created_at->diffForHumans()}}</p>

                    </div>
                    <div class="card-footer text-muted  d-flex justify-content-between">

                        <a href="{{route('brands.index')}}"class="btn btn-primary px-2">Regresar</a>
                        <div class="btn-group">
                            <a href="{{route('brands.edit',$brands)}}" class="btn btn-success px-2"> Editar</a>
                            <a href="#" class="btn btn-danger px-2" onclick="event.preventDefault();document.getElementById('delete-project').submit();">Eliminar</a>
                        </div>
                    </div>
                </div>
                <form method="POST" id="delete-project" style="display: none;" action="{{route('brands.destroy',$brands)}}">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
    </div>

@endsection
