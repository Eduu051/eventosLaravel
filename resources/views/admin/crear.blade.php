@extends('layouts.master')

@section('title')
    Crear
@endsection

@section('content')

    <div class="justify-content-center d-flex mt-4 mb-4">
        <div class="card border-light text-center w-50">
            <div class="card-header"><h1>Crear evento</h1></div>
            <form action="{{route('admin.store')}}" method="post">
                @csrf

                <div class="form-group">
                    <label for="nombre" class="mt-2">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                    @error('nombre')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion" class="mt-2">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                    @error('descripcion')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fecha" class="mt-2">Fecha del evento</label>
                    <input type="date" name="fecha_evento" id="fecha_evento" class="form-control">
                    @error('fecha_evento')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imagen" class="mt-2">Imagen</label>
                    <input type="text" name="imagen" id="imagen" class="form-control">
                    @error('imagen')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hora" class="mt-2">Hora del evento</label>
                    <input type="time" name="hora" id="hora" class="form-control">
                    @error('hora')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="max" class="mt-2">Maximo de personas</label>
                    <input type="number" name="max_personas" id="max" class="form-control">
                    @error('max_personas')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="min" class="mt-2">Edad mínima</label>
                    <input type="number" name="edad_minima" id="edad_minima" class="form-control">
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
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-3">Enviar</button>
            </form>
        </div>
    </div>
@endsection