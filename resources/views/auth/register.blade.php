@extends('layouts.auth.app')
@section('title', 'Registrarse')
@section('content')
<div class="bold-title">Tendrás tu historial de encriptaciones<br>  almacenados de<span> por vida</span></div>
<div class="form-login">
    <div class="card-form">
        <div class="card-efect"></div>
        <div class="card-box">
            <div class="card-header-login">
                Registro
            </div>
            <div class="form-login-ml">
                <form method="POST" action="{{ url('register') }}">
                    @csrf
                    <div class="input-group-ml">
                        <input id="name" type="text" class="form-focus" name="name" value="{{ old('name') }}" placeholder="Nombre de usuario" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="input-group-ml">
                        <input id="email" type="email" class="form-focus" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="input-group-ml">
                        <input id="password" type="password" class="form-focus"  name="password" placeholder="Contraseña" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="input-group-ml">
                        <input id="password-confirm" type="password" class="form-focus" name="password_confirmation" placeholder="Confirmar contraseña" required>
                    </div>
                    <div>
                        <button type="submit" class="btn-submit-login">Registrarse</button>
                    </div>
                </form>
                <div class="footer-form mt-10">
                    <a href="{{ route('login') }}">Ya tengo una cuenta</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
