@extends('predefinido');

@section('contenido')
    <div class="col-md-7 mx-5">
        <h2 class="featurette-heading fw-normal lh-1">Registro de usuario</h2>
        <p class="lead">Rellena los datos para crear un nuevo usuario</p>
    </div>

    <div class="container-fluid py-5 bg-light m-0">
        <div class="w-50 m-auto">
            <div class="container px-5">
                <form action="/register" method="post">
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="inputApellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="inputApellidos" name="apellidos">
                    </div>
                    <div class="mb-3">
                        <label for="inputTelefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="inputTelefono" name="telefono">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="inputEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="inputPassword" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="inputPasswordConfirmation" class="form-label">Repite la contraseña</label>
                        <input type="password" class="form-control" id="inputPasswordConfirmation" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    @include('partials.errores')

@endsection
