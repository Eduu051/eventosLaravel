@extends('layouts.loginMaster')

@section('title')
    Inicar Sesión
@endsection

@section('content')
<div class="container">
    
    <div class="text-center mb-4 mt-4">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px;">
        <p class="mt-2">Aplicación web que permite a los usuarios registrarse e iniciar sesión para acceder a las funcionalidades de la aplicación. Ofrece un listado de eventos disponibles en la base de datos de los cuales te podrás registrar.</p>
    </div>

    <div class="row justify-content-center w-100">
        <div class="col-md-8 justify-content-center d-flex mt-4">
            <div class="card border-light text-center w-100">
                <div class="card-header">Inicar sesión</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Correo</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Iniciar sesión
                                </button>

                                <a href="{{route('register')}}" class="btn btn-primary">
                                    Registrar
                                </a>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">¿Has olvidado la contraseña?</a>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
