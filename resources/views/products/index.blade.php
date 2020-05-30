@extends('layouts/appLibrery')
@section('title','Productos')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-content-center my-2">
            <h1>Productos</h1>
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('products.index')}}">
                <input class="form-control mr-sm-2" name="name" type="search" placeholder="Nombres..." aria-label="Search">
                <input class="form-control mr-sm-2" name="brand" type="search" placeholder="Codigo de marca..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <a href="{{route('products.create')}}" class="btn btn-info btn-lg ">Ingresar una producto nuevo</a>

        </div>
    <div class="list-group">



            @forelse ($products as $item)
            <a href="{{route('products.show', $item)}}" class="list-group-item list-group-item-action flex-column align-items-start mb-1 list-group-item-light">
                <div class="d-flex justify-content-around align-content-center p-1">
                            <div class="d-inline-flex">
                                <h5 class="display-4">{{$item->name}}</h5>
                                @if($item->file)
                                    <img style="height: 75px; width: auto;" src="{{$item->file }}">
                                @endif
                            </div>



                    <div class="p-4">
                        <h5 class="text-dark">Cantidad {{$item->quantity}}</h5>
                        <h5 class="text-dark">Marca {{$item->brand['name']}}</h5>
                        <h5 class="text-dark">Precio {{$item->price}}</h5>
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
                {{$products    ->links()}}

             </div>



    </div>


@endsection
