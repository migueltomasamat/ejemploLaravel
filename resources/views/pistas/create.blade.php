@extends('predefinido')

@section('contenido')
    <div class="w-50 m-auto py-5 bg-light">
        <div class="container px-5">
                <form action="/pista" method="post">
                    {{csrf_field()}}
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name=luz id="flexSwitchCheckDefault" checked>
                        <label class="form-check-label" for="flexSwitchCheckDefault">La pista tiene luz</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name=cubierta id="flexSwitchCheckChecked" >
                        <label class="form-check-label" for="flexSwitchCheckChecked">La pista está cubierta</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name=disponible id="flexSwitchCheckDisabled" checked>
                        <label class="form-check-label" for="flexSwitchCheckDisabled">La pista esta disponible</label>
                    </div>
                    <div class="mb-3">
                        <label for="inputPrecio" class="form-label">Precio Luz</label>
                        <input type="number" class="form-control" id="inputPrecio" name="precioLuz" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="selectTipo" class="form-label">Selecciona el tipo de pista</label>
                        <select class="form-select" id="selectTipo" name="tipoPista" aria-label="Default select example">
                            <option value="Individual">Individual</option>
                            <option value="Dobles">Dobles</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


@endsection
