@extends('layouts/appLibrery')
@section('title','Ingresar Productos nuevos')
@section('content')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @include('partials/sessionB')

    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-10 mx-auto">
                <div class="bg-white py-3 px-4 shadow rounded">
                    <form class="" method="GET" action="{{route('sales.create')}}">
                        <div class="form-inline my-2 my-lg-0">
                            <input class="form-control col-10" name="name" type="search" placeholder="Nombres..." aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0 col-2" type="submit">Search</button>
                        </div>
                        {{session(['idFactura' => $sales->id])}}

                    </form>
                    <form method="POST" action="{{route('store_product')}}">

                        @csrf
                        <select name="id_product" id="id_product" class="custom-select  @error('id_product')is-invalid @enderror">
                            @forelse ($products as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @empty
                                <option value="0"> No Productos disponibles</option>
                            @endforelse
                        </select>
                        <div class="d-flex justify-content-center" style="text-align: center;">
                            <div class="form-group col-md-4">
                                <label for="name">Cantidad</label>
                                <input type="number" name="quantity" class="form-control @error('quantity')is-invalid @enderror" id="quantity" value=""/>
                                @error('quantity')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary my-2">Agregar Producto</button>
                        </div>
                    </form>
                </div>

                <hr>


                <div  class="bg-white py-3 px-4 shadow rounded" >
                    <div style="text-align: center;">
                        <h1>Lista de Productos</h1><hr>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                            <th scope="col">Opciones</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($details as $item)
                        <tr>
                            <th scope="row">{{$item->id_sales}}</th>
                            <td>{{$item->product['name']}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->subtotal}}</td>
                            <td>
                                <a href="#" class="btn btn-danger"  onclick="event.preventDefault();document.getElementById('form-{{$item->id}}').submit();">Eliminar</a>
                            <form action="{{route('delete_detail', $item->id) }}" method="POST" id="form-{{$item->id}}" style="display: none;">
                                @csrf @method('delete')

                            </form>
                            </td>

                        </tr>
                        @empty

                        @endforelse
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td> Total</td>
                            <td>{{$sales->total}}</td>
                            <td></td>

                        </tr>
                        </tbody>

                    </table>
                    @csrf
                    <div style="text-align: center;">
                        <h1>Datos de facturacion</h1><hr>
                    </div>
                    <form method="POST" action="{{route('sales.update', $sales->id)}}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" value="{{old('name', $sales->name)}}"/>
                            @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name">Direccion de Facturacion</label>
                            <input type="text" name="address" class="form-control @error('address')is-invalid @enderror" id="address" value="{{old('address', $sales->address)}}"/>
                            @error('address')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary my-2">Guardar datos de facturacion</button>
                        </div>
                    </form>
                    <div class="row">
                        <a href="#"class="btn btn-danger col-3" onclick="event.preventDefault();document.getElementById('form-cancel').submit();">Cancelar</a>
                        <a href="{{route('sales.index') }}"class="btn btn-info col-3" >Regresar y Guardar</a>
                        <a  href="{{route('create_pdf',$sales->id)}}" class="btn btn-primary col-3">Generar PDF</a>
                        <a href="#"class="btn btn-danger col-3" onclick="event.preventDefault();document.getElementById('form-terminar').submit();">Terminar</a>
                    </div>

                    <form action="{{route('cancel', $sales->id) }}" method="POST" id="form-cancel" style="display: none;">
                        @csrf @method('delete')

                    </form>
                    <form action="{{route('terminar', $sales->id) }}" method="POST" id="form-terminar" style="display: none;">
                        @csrf @method('delete')

                    </form>
                </div>
            </div>
        </div>

@endsection

