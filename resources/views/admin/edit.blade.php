@extends('layouts.master')

@section('title')
    Editar
@endsection

@section('content')

    <div class="justify-content-center d-flex mt-4 mb-4">
        <div class="card border-light text-center w-50">
            <div class="card-header"><h1>Editar evento</h1></div>
            <form action="{{route('admin.update',['id'=>$evento->id])}}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre" class="mt-2">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                    value="{{$evento->nombre}}">
                    @error('nombre')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion" class="mt-2">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{$evento->descripcion}}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fecha" class="mt-2">Fecha del evento</label>
                    <input type="date" name="fecha_evento" id="fecha_evento" class="form-control"
                    value="{{$evento->fecha_evento}}">
                    @error('fecha_evento')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imagen" class="mt-2">Imagen</label>
                    <input type="text" name="imagen" id="imagen" class="form-control"
                    value="{{$evento->imagen}}">
                    @error('imagen')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hora" class="mt-2">Hora del evento</label>
                    <input type="time" name="hora" id="hora" class="form-control"
                    value="{{$evento->hora}}">
                    @error('hora')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="max" class="mt-2">Maximo de personas</label>
                    <input type="number" name="max_personas" id="max_personas" class="form-control"
                    value="{{$evento->max_personas}}">
                    @error('max_personas')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="min" class="mt-2">Edad mínima</label>
                    <input type="number" name="edad_minima" id="edad_minima" class="form-control"
                    value="{{$evento->edad_minima}}">
                    @error('edad_minima')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}"
                            @if ($evento->category_id == $categoria->id)
                                selected
                            @endif    
                            >{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-3">Enviar</button>
            </form>
        </div>
    </div>
@endsection