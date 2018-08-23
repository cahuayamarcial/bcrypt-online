@extends('layouts.auth.app')
@section('title', 'Restablecer contraseña')
@section('content')
<div class="bold-title">Tendrás tu historial de encriptaciones<br>  almacenados de<span> por vida</span></div>
<div class="form-login">
    <div class="card-form">
        <div class="card-efect"></div>
        <div class="card-box">
            <div class="card-header-login">
                Restablecer contraseña
            </div>
            <div class="form-login-ml">
                <form method="POST" action="{{ route('password.request.reset') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input-group-ml">
                        <input id="email" type="email" class="form-focus" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="input-group-ml">
                        <input id="password" type="password" class="form-focus"  name="password" placeholder="Nueva contraseña" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="input-group-ml">
                        <input id="password-confirm" type="password" class="form-focus" name="password_confirmation" placeholder="Confirmar nueva contraseña" required>
                    </div>
                    <div>
                        <button type="submit" class="btn-submit-login">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
