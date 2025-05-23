@extends('layouts.master')

@section('title')
    Crear
@endsection

@section('content')

    <div class="justify-content-center d-flex mt-4 mb-4">
        <div class="card border-light text-center w-50">
            <div class="card-header"><h1>Crear categoria</h1></div>
            <form action="{{route('admin.storeCategoria')}}" method="post">
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
                
                <button type="submit" class="btn btn-primary mt-3 mb-3">Enviar</button>
            </form>
        </div>
    </div>
@endsection