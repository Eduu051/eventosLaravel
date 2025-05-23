@extends('layouts.master')

@section('title')
    Página Principal Admin
@endsection

@section('content')
    @if (isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == 'eliminado')
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <strong>Evento eliminado</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == 'edit')
        <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
            <strong>Evento editado</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == 'creado')
        <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
            <strong>Has creado un evento</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == 'categoriaNew')
        <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
            <strong>Has creado una nueva categoria</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == 'categoriaEliminada')
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <strong>Has eliminado una categoria</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h1 class="text-center mt-3">EVENTOS DISPONIBLES</h1>

    @foreach ($categorias as $categoria)
        <h3 class="capitalizar-primera">{{$categoria->nombre}} <a href="{{route('admin.destroyCategoria', ['id'=>$categoria->id])}}" class="btn btn-danger">Eliminar categoria</a></h3>
        @if ($categoria->esdeveniments()->count() > 0)
            <div class="row mt-4">
                @foreach ($categoria->esdeveniments as $evento)
                    <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                        <div class="card w-100">
                            <a href="{{ route('admin.show', ['id' => $evento->id]) }}" style="text-decoration: none; color: black;">
                                <img src="{{ $evento->imagen }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $evento->nombre }}</h5>
                                    <p class="card-text text-muted mb-1">{{ $evento->descripcion }}</p>
                                    <p class="card-text"><strong>Fecha:</strong> {{ $evento->fecha_evento }}</p>
                                    <p class="card-text"><strong>Hora:</strong> {{ $evento->hora }}</p>
                                </div>
                            </a>
                            <div class="card-footer bg-white border-0 d-flex justify-content-around">
                                <a href="{{route('admin.destroy', ['id'=>$evento->id])}}" class="btn btn-danger">Eliminar</a>
                                <a href="{{route('admin.edit',['id'=>$evento->id])}}" class="btn btn-warning">Modificar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">No hay eventos de esta categoria</p>
        @endif
    @endforeach
@endsection