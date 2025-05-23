@extends('layouts.master')

@section('title')
    Página Principal
@endsection

@section('content')
    @if (isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == 'noAdmin')
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <strong>No puedes acceder a esta pagina. No eres administrador</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == 'reservado')
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong>Evento reservado con éxito</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == 'yaReservado')
        <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
            <strong>Ya has reservado este evento</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == 'cancelado')
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <strong>Reserva cancelada</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == 'noPuede')
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <strong>No tienes la edad suficiente para reservar este evento</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h1 class="text-center mt-3">TUS EVENTOS</h1>
    <div class="row mt-4">
    @if (Auth::user()->esdeveniments->count() > 0)
        @foreach ($categorias as $categoria)
                @foreach ($categoria->esdeveniments as $evento)
                    @if (Auth::user()->esdeveniments->contains($evento->id))    
                    <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                        <div class="card w-100">
                            <a href="{{ route('esdeveniments.show', ['id' => $evento->id]) }}" style="text-decoration: none; color: black;">
                            <img src="{{ $evento->imagen }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $evento->nombre }}</h5>
                                <p class="card-text text-muted mb-1">{{ $evento->descripcion }}</p>
                                <p class="card-text"><strong>Fecha:</strong> {{ $evento->fecha_evento }}</p>
                                <p class="card-text"><strong>Hora:</strong> {{ $evento->hora }}</p>
                            </div>
                            </a>
                        </div>
                    </div>
                    @endif
                @endforeach
        @endforeach
    @else
        <h3 class="text-center text-muted">No tienes ninguna reserva</h3>
    @endif
        
    </div>

    <h1 class="text-center mt-3">EVENTOS DISPONIBLES</h1>

        @foreach ($categorias as $categoria)
            <h3 class="capitalizar-primera">{{$categoria->nombre}}</h3>
            @if ($categoria->esdeveniments()->count() > 0)
                <div class="row mt-4">
                    @foreach ($categoria->esdeveniments as $evento)
                        @if ($evento->user()->count() < $evento->max_personas)
                            <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                                <div class="card w-100">
                                    <a href="{{ route('esdeveniments.show', ['id' => $evento->id]) }}" style="text-decoration: none; color: black;">
                                        <img src="{{ $evento->imagen }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $evento->nombre }}</h5>
                                            <p class="card-text text-muted mb-1">{{ $evento->descripcion }}</p>
                                            <p class="card-text"><strong>Fecha:</strong> {{ $evento->fecha_evento }}</p>
                                            <p class="card-text"><strong>Hora:</strong> {{ $evento->hora }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                                <div class="card w-100">
                                    <a href="{{ route('esdeveniments.show', ['id' => $evento->id]) }}" style="text-decoration: none; color: black;">
                                        <img src="{{ $evento->imagen }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $evento->nombre }}</h5>
                                            <p class="card-text text-muted mb-1">{{ $evento->descripcion }}</p>
                                            <p class="card-text"><strong>Fecha:</strong> {{ $evento->fecha_evento }}</p>
                                            <p class="card-text"><strong>Hora:</strong> {{ $evento->hora }}</p>
                                            <p class="card-text"><span>Ya no quedan entradas</span></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <p class="text-muted">No hay eventos de esta categoria</p>
            @endif
        @endforeach
@endsection