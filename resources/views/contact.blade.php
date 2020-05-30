@extends('layout')
@section('title','Contacto')

@section('content')

  {{--
      @if ($errors->any())
          @foreach ($errors->firts('name') as $item)
              <p>{{$item}}</p>
          @endforeach
      @endif --}}
  <div class="container">
      <div class="row">
          <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form method="POST" class="bg-white py-3 px-3 shadow rounded" action="{{route('massage.store')}}">
                @csrf
                <h1>@lang('Contact')</h1>

                <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control @error('name')is-invalid @enderror " id="name" value="{{old('name')}}">
                          @error('name')
                          <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                          @enderror
                    </div>
                      <div class="form-group col-md-6">
                        <label for="email">Email</label>
                      <input type="text" name="email" class="form-control  @error('email')is-invalid @enderror" id="email" value="{{old('email')}}">
                          @error('email')
                          <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                          @enderror
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="subject">Subjet</label>
                          <input type="text" name="subject" class="form-control  @error('subject')is-invalid @enderror" id="subjet" value="{{old('subjet')}}">
                            @error('subject')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="mensaje">Mensaje</label>
                          <textarea type="text" name="mensaje" class="form-control  @error('mensaje')is-invalid @enderror" id="mensaje">{{old('mensaje')}}</textarea>
                            @error('mensaje')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Enviar</button>
                  </form>
             </div>
        </div>
  </div>
@endsection
