@extends('layout')

@section('contenido')
    <div class="col-md-7 mx-5">
        <h2 class="featurette-heading fw-normal lh-1">Detalles de la pista {{$pista->id}}</h2>
        <p class="lead">Consulta todos los detalles</p>
    </div>
    <div class="container-fluid py-5 bg-light m-0">
        <div class="container">
            <div class="row">
                <div class="col-4">
                        @if($pista->tipoPista=='Individual')
                            <img src="/img/pistas/individual.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                        @else
                            <img src="/img/pistas/dobles.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                        @endif
                    </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <p class="lead">Características</p>
                            @if($pista->luz)
                                <p>Esta pista tiene luz disponible</p>
                            @else
                                <p>Esta pista no tiene luz disponible</p>
                            @endif
                            @if($pista->cubierta)
                                <p>Esta pista está cubierta</p>
                            @else
                                <p>Esta pista no está cubierta</p>
                            @endif
                            @if($pista->disponible)
                                <div class="btn-group py-2">
                                    <a href="/modificar-pista/{{$pista->id}}"><button type="button" class="btn btn-sm btn-outline-primary">Edita</button></a>
                                </div>
                            @else
                                <p class="text-danger">Pista no disponible</p>
                            @endif

                            <nav>
                                <ul class="pagination">
                                    @if($pista->id!=1)
                                        <li class="page-item"><a class="page-link" href="/pista/{{($pista->id)-1}}">Anterior</a></li>
                                    @else
                                        <li class="page-item disabled"><a class="page-link" href="/pista/{{($pista->id)-1}}">Previous</a></li>
                                    @endif
                                    @if($pista->id!=\App\Models\Pista::latest()->first()->id)
                                        <li class="page-item"><a class="page-link" href="/pista/{{($pista->id)+1}}">Siguiente</a></li>
                                    @else
                                        <li class="page-item disabled"><a class="page-link" href="/pista/{{($pista->id)+1}}">Siguiente</a></li>
                                    @endif
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
