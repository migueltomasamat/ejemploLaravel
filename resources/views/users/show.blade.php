@extends('predefinido');

@section('contenido')
    <div class="col-md-7 mx-5">
        <h2 class="featurette-heading fw-normal lh-1">Datos de {{$user->nombre}} {{$user->apellidos}}</h2>
        <p class="lead">Estos son los datos de tu usuario</p>
    </div>

    <div class="container-fluid py-5 bg-light m-0">
        <div class="w-50 m-auto">
            <div class="container px-5">

                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="nombre" value="{{$user->nombre}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="inputApellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="inputApellidos" name="apellidos" value="{{$user->apellidos}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="inputTelefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="inputTelefono" name="telefono" value="{{$user->telefono}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" value="{{$user->email}}" readonly>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <div class="btn-group py-2">
                                <a href="/edit-user"><button type="button" class="btn btn-outline-primary ">Editar</button></a>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="btn-group py-2">
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Borrar Usuario</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Desea borrar este usuario {{$user->nombre}} {{$user->apellidos}}. La acción no se podrá deshacer</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <form action="/user/{{$user->id}}" method="post">
                                                    {{csrf_field()}}
                                                    @method('delete')
                                                    <input type="submit" class="btn btn-outline-danger" value="Borrar">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-danger mx-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Borrar
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    @include('partials.errores')

@endsection
