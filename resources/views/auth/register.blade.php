@extends('layouts.loginMaster')

@section('title')
    Registro
@endsection

@section('content')
<div class="container">

    <div class="text-center mb-4 mt-4">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px;">
    </div>

    <div class="row justify-content-center w-100 mb-4">
        <div class="col-md-8 justify-content-center d-flex mt-4">
            <div class="card border-light text-center w-100">
                <div class="card-header">Registro</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nombre" class="mt-2">Nombre</label>
                            <input id="nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="mt-2">Correo</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="contraseña" class="mt-2">Contraseña</label>
                            <input id="contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('contraseña')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="confirmar-contraseña" class="mt-2">Confirmar contraseña</label>
                            <input id="confirmar-contraseña" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                            <label for="fecha" class="mt-2">Fecha de nacimiento</label>
                            <input type="date" name="fecha" id="fecha" class="form-control">
                        </div>

                        <div class="row mb-0">
                            <div class="col-12 text-center">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    ¿Ya estas registrado?
                                </a>
                                <button type="submit" class="btn btn-primary mt-4">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
