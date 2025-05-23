@extends('layouts.master')

@section('title')
    {{$evento->nombre}}
@endsection

@section('content')
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-5 text-center mb-4 mb-md-0">
            <img src="{{ $evento->imagen }}" class="img-fluid rounded shadow-sm w-100" style="height: 400px; object-fit: cover;" alt="Imagen del evento">
        </div>

        <div class="col-md-6 ms-md-4">
            <h1 class="mb-3">{{ $evento->nombre }}</h1>
            <h5 class="text-muted mb-4">Descripción del evento:</h5>
            <p class="mb-4">{{ $evento->descripcion }}</p>
            <h5 class="text-muted mb-4">Fecha del evento:</h5>
            <p>{{$evento->fecha_evento}} - {{$evento->hora}}</p>
            <h5 class="text-muted mb-4">Edad mínima:</h5>
            <p>{{$evento->edad_minima}}</p>
            <h5 class="text-muted mb-4">Entradas disponibles</h5>
            <p>{{$evento->max_personas - $evento->user()->count()}}</p>

            <div class="d-flex gap-2">
                    
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Eliminar</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar evento</h5>
                            </div>
                            <div class="modal-body">
                                <h2>{{$evento->nombre}}</h2>
                            </div>
                            <div class="modal-footer">
                                <a href="{{route('admin.destroy', ['id'=>$evento->id])}}" class="btn btn-danger mr-2">Eliminar</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.edit',['id'=>$evento->id])}}" class="btn btn-warning">Modificar</a>
            </div>
        </div>
    </div>
</div>
@endsection
