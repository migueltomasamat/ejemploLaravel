@extends ('predefinido')

@section('contenido')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($pistas as $pista)
                    <div class="col">
                        <div class="card shadow-sm">
                            @if($pista->tipoPista=='Individual')
                                <img src="/img/pistas/individual.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                            @else
                                <img src="/img/pistas/dobles.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                            @endif
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/pista/{{$pista->id}}"><button type="button" class="btn btn-sm btn-outline-primary">Más Detalles</button></a>
                                    </div>
                                    @if($pista->disponible==true)
                                        <small class="text-success">Disponible</small>
                                    @else
                                        <small class="text-danger">No disponible</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
