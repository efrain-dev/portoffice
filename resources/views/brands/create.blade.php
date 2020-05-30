@extends('layouts/appLibrery')
@section('title','Crear Marcas')
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
    <div class="container ">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form method="POST" class="bg-white py-3 px-4 shadow rounded" action="{{route('brands.store')}}" enctype="multipart/form-data">
                    <h1>Crear una nueva marca</h1>
                    <hr>
                    @csrf
                    @include('brands._form')
                    <div class="row">
                        <a href="{{route('brands.index')}}"class="btn btn-warning col-6">Regresar</a>
                        <button type="submit" class="btn btn-primary col-6">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection

