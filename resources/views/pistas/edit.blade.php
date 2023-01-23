@extends('predefinido')

@section('contenido')
    <div class="col-md-7 mx-5">
        <h2 class="featurette-heading fw-normal lh-1">Modificación de Pista {{$pista->id}}</h2>
        <p class="lead">Actualiza los datos de una pista</p>
    </div>
    <div class="container-fluid py-5 bg-light m-0">
        <div class="w-50 m-auto">
            <div class="container px-5">
                <form action="/pista/{{$pista->id}}" method="post">
                    {{csrf_field()}}
                    @method('put')
                    <p class="lead">Actualiza los datos de la pista</p>
                    <div class="form-check form-switch">
                        @if($pista->luz)
                            <input class="form-check-input" type="checkbox" role="switch" name=luz id="flexSwitchCheckDefault" checked value="1">
                        @else
                            <input class="form-check-input" type="checkbox" role="switch" name=luz id="flexSwitchCheckDefault" value="1">
                        @endif

                        <label class="form-check-label" for="flexSwitchCheckDefault">La pista tiene luz</label>
                    </div>
                    <div class="form-check form-switch">
                        @if($pista->cubierta)
                            <input class="form-check-input" type="checkbox" role="switch" name=cubierta id="flexSwitchCheckChecked" checked value="1">
                        @else
                            <input class="form-check-input" type="checkbox" role="switch" name=cubierta id="flexSwitchCheckChecked" value="1">
                        @endif
                        <label class="form-check-label" for="flexSwitchCheckChecked">La pista está cubierta</label>
                    </div>
                    <div class="form-check form-switch">
                        @if($pista->disponible)
                            <input class="form-check-input" type="checkbox" role="switch" name=disponible id="flexSwitchCheckDisabled" checked value="1">
                        @else
                            <input class="form-check-input" type="checkbox" role="switch" name=disponible id="flexSwitchCheckDisabled" value="1">
                        @endif
                        <label class="form-check-label" for="flexSwitchCheckDisabled">La pista esta disponible</label>
                    </div>
                    <div class="mb-3">
                        <label for="inputPrecio" class="form-label">Precio Luz</label>
                        <input type="number" step="0.01" class="form-control" id="inputPrecio" name="precioLuz" aria-describedby="emailHelp" value="{{$pista->precioLuz}}">
                    </div>
                    <div class="mb-3">
                        <label for="selectTipo" class="form-label">Selecciona el tipo de pista</label>
                        <select class="form-select" id="selectTipo" name="tipoPista" aria-label="Default select example">
                            <option value="Individual">Individual</option>
                            @if($pista->tipoPista=='Dobles')
                                <option selected value="Dobles">Dobles</option>
                            @else
                                <option value="Dobles">Dobles</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @include('partials.errores')

@endsection
