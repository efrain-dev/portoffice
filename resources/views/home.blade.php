@extends('layout')
@section('title','Home')
<style>
    body{
        background-image:  url("/img/book3.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>
@section('content')

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="figure-img">
                <img src="/img/icono.png" class="" height="300px" width="auto" alt="">
            </div>
        </div>
        <div class="d-flex justify-content-around">
            <div class="py-3">
                <img src="/img/book.png" class="d-block " height="200px" width="auto" alt="">
                <a href="{{route('about')}}" class="btn btn-info btn-lg d-block">Sobre Nosotros</a>
            </div>
            <div class="py-3">
                <img src="/img/mail.png" class="d-block " height="200px" width="auto" alt="">
                <a href="{{route('contact')}}" class="btn btn-info btn-lg d-block">Contactanos</a>
            </div>
        </div>


    </div>






@endsection
