@extends('layouts/appLibrery')
@section('title','Productos')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-content-center my-2">
            <h1>Ventas</h1>
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('sales.index')}}">
                <input class="form-control mr-sm-2" name="name" type="search" placeholder="Nombres..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <a href="{{route('sales.create')}}" class="btn btn-info btn-lg ">Proceso de venta nuevo</a>

        </div>
    <div class="list-group">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <a href=""></a> <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>
                <th scope="col">Fecha</th>
                <th scope="col">Total</th>

                <th scope="col"></th>


            </tr>
            </thead>
            <tbody>

            @forelse($sales as $sale)
            <tr>
                <th scope="row">{{$sale->id}}</th>
                <td>{{$sale->name}}</td>
                <td>{{$sale->address}}</td>
                <td>{{$sale->created_at->format('M d Y')}}</td>
                <td>{{$sale->total}}</td>

                <td> <a href="{{route('show_factura',$sale->id)}}" class="btn btn-primary">Ver</a>
                    <a href="#" class="btn btn-danger"  onclick="event.preventDefault();document.getElementById('form-{{$sale->id}}').submit();">Eliminar</a></td>
                <form action="{{route('cancel', $sale->id) }}" method="POST" id="form-{{$sale->id}}" style="display: none;">
                    @csrf @method('delete')

                </form>
            </tr>
            @empty


            @endforelse
            </tbody>
        </table>







    </div>


@endsection
