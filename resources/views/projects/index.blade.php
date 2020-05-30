@extends('layouts/appLibrery')
@section('title','Portafolio')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-content-center my-2">
            <h1>Portafolio </h1>

                <a href="{{route('projects.create')}}" class="btn btn-primary btn-lg "> Crear un Nuevo proyecto</a>

        </div>
    <div class="list-group">



            @forelse ($projects as $item)
            <a href="{{route('projects.show', $item)}}" class="list-group-item list-group-item-action flex-column align-items-start mb-2 list-group-item-{{setStatus($item->status)}} ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$item->title}}</h5>
                    <small>{{$item->status}}</small>
                </div>
                <p class="mb-1">{{$item->description}}</p>
            </a>
            @empty
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start mb-2 list-group-item-dark ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">No hay proyectos que mostrar</h5>
                </div>

            </a>
            @endforelse
            <div class="d-flex justify-content-center align-content-center my-2">
                {{$projects->links()}}

             </div>



    </div>


@endsection
