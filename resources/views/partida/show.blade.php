@extends('predefinido');

@section('contenido')
    <div class="col-md-7 mx-5">
        <h2 class="featurette-heading fw-normal lh-1">Creación de una nueva partida</h2>
        <p class="lead">Rellena los datos para poder crear una nueva partida</p>
    </div>

    <div class="container-fluid py-5 bg-light m-0">
        <div class="w-50 m-auto">
            <div class="container px-5">
                <form action='/partida' method=post>
                    {{csrf_field() }}
                </form>
            </div>
        </div>
    </div>

    @include('partials.errores')

@endsection
