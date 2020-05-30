@extends('layouts/appLibrery')
@section('title','Libreria')

@section('content')
    <style>
        body{
            background-image:  url("/img/work.png");
            background-repeat: no-repeat;
            background-size:100% 100vh;
        }

    </style>
    <div class="container"style="opacity: 80%">
        <div class="row">
                <div class="list-group col-6">
                    <div style="text-align: center;">
                        <h1 class="display-3">Aplicaciones</h1>
                    </div>
                    <a href="{{route('projects.index')}}" class="list-group-item list-group-item-action mb-2 list-group-item-success ">
                            <div style="text-align: center;">
                                <h5 class="display-4">Portofolio</h5><br>
                                <h3>Seccion de los proyectos trabajados</h3>
                            </div>
                        </a>

                    <a href="{{route('brands.index')}}" class="list-group-item list-group-item-action mb-2 list-group-item-warning">
                        <div style="text-align: center;">
                            <h5 class="display-4">Marcas</h5><br>
                            <h3>Seccion de las marcas</h3>
                        </div>

                    </a>

                    <a href="{{route('products.index')}}" class="list-group-item list-group-item-action mb-2 list-group-item-danger ">
                        <div style="text-align: center;">
                            <h5 class="display-4">Productos</h5><br>
                            <h3>Seccion del inventariado de los productos</h3>
                        </div>

                        </a>

                    </div>

                    <div class="list-group col-6">
                        <div style="text-align: center;">
                            <h1 class="display-3">Servicios</h1>
                        </div>
                        <a href="{{route('sales.index')}}" class="list-group-item list-group-item-action mb-2 list-group-item-success ">
                            <div style="text-align: center;">
                                <h5 class="display-4">Ventas</h5><br>
                                <h3>Seccion de ventas</h3>
                            </div>

                        </a>

                    </div>
            </div>
        </div>

@endsection
