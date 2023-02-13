@extends('predefinido');

@section('contenido')
    <div class="col-md-7 mx-5">
        <h2 class="featurette-heading fw-normal lh-1">Modificar usuario {{$user->nombre}} {{$user->apellidos}}</h2>
        <p class="lead">Modifica los datos de tu usuario</p>
    </div>

    <div class="container-fluid py-5 bg-light m-0">
        <div class="w-50 m-auto">
            <div class="container px-5">
                <form action="/user/{{$user->id}}" method="post">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="nombre" value="{{$user->nombre}}">
                    </div>
                    <div class="mb-3">
                        <label for="inputApellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="inputApellidos" name="apellidos" value="{{$user->apellidos}}">
                    </div>
                    <div class="mb-3">
                        <label for="inputTelefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="inputTelefono" name="telefono" value="{{$user->telefono}}">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" value="{{$user->email}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                </form>
            </div>
        </div>
    </div>

    @include('partials.errores')

@endsection
