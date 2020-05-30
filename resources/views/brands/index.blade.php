@extends('layouts/appLibrery')
@section('title','Marcas')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-content-center my-2">
            <h1>Marcas</h1>
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('brands.index')}}">
                <input class="form-control mr-sm-2" name="name" type="search" placeholder="Nombres..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
                <a href="{{route('brands.create')}}" class="btn btn-info btn-lg ">Ingresar una nueva marca</a>

        </div>
    <div class="list-group">



            @forelse ($brands as $item)
            <a href="{{route('brands.show', $item)}}" class="list-group-item list-group-item-action flex-column align-items-start mb-2 list-group-item-light">
                <div class="d-flex justify-content-around align-content-center p-2">
                    <div class=""style="text-align: center;">

                        <div>
                            <h5 class="display-3">{{$item->name}}</h5>
                        </div>
                        <div class="">
                            @if($item->file)
                                <img style="height: 200px; width: auto;" src="{{$item->file }}">
                            @endif
                        </div>
                    </div>
                    <div class="p-4">
                        <h5 class="text-dark">{{$item->description}}</h5>
                    </div>
                </div>

            </a>


           @empty
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start mb-2 list-group-item-dark ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">No hay proyectos que mostrar</h5>
                </div>

            </a>
            @endforelse
            <div class="d-flex justify-content-center align-content-center my-2">
                {{$brands    ->links()}}

             </div>



    </div>


@endsection
