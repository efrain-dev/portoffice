@extends('layouts/appLibrery')
@section('title','Editar Producto')
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
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form method="POST" action="{{route('products.update',$product)}}" class="text-center bg-white py-3 px-3 shadow rounded">
                    <h1>Editar  Marca</h1>
                    @csrf @method('PATCH')

                    <div class="form-row ">
                        <div class="form-group col-md-12">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" value="{{old('name', $product->name)}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-12">
                            <label for="name">Cantidad</label>
                            <input type="number" name="quantity" class="form-control @error('quantity')is-invalid @enderror" id="quantity" value="{{old('quantity', $product->quantity)}}"/>
                            @error('quantity')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-12">
                            <label for="name">Precio</label>
                            <input type="number" name="price" class="form-control @error('price')is-invalid @enderror" id="price" value="{{old('price', $product->price)}}"/>
                            @error('price')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div  style="text-align: center;">

                            <h4 for="description">Imagen ilustrativa del producto</h4>
                            <img id="blah" src="{{setEmpy($product->file)}}" style="height: 200px; width: auto" alt="your image" />
                    </div>

                    <a href="{{route('products.show',$product)}}" class="btn btn-warning col-4">Regresar</a>
                        <button type="submit" class="btn btn-primary col-4">Guardar</button>

                </form>
            </div>
        </div>
    </div>
@endsection

