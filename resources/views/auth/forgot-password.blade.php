@extends('layouts.loginMaster')

@section('content')
<div class="container">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 justify-content-center d-flex mt-4">
            <div class="card border-light text-center w-100">
                <div class="card-header">Restablecer contraseña</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        Introduce el correo para recuperar la contraseña
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="from-group">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Recuperar contraseña
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
