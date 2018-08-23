@extends('layouts.auth.app')
@section('title', 'Ingresar')
@section('content')
<div class="bold-title">Tendrás tu historial de encriptaciones<br>  almacenados de<span> por vida</span></div>
<div class="form-login">
    <div class="card-form">
        <div class="card-efect"></div>
        <div class="card-box">
            <div class="card-header-login">
                Login
            </div>
            <div class="form-login-ml">
                <form  method="POST" action="{{ url('login') }}">
                    @csrf
                    <div class="input-group-ml">
                        <input id="email" name="email" class="form-focus" type="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span>
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="input-group-ml">
                        <input id="password" type="password" class="form-focus" name="password" placeholder="Contraseña" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="button-margin">
                        <button type="submit" class="btn-submit-login">Ingresar</button>
                        <a href="{{ route('password.request') }}" class="pass">Olvidaste tu contraseña?</a>
                    </div>
                </form>
                <div class="social">
                    <ul class="soc_icons2">
                        <li class="pic"><a href="{{ route('facebook') }}"><i class="icon_4"></i></a></li>
                        <li class="pic"><a href="{{ route('google') }}"><i class="icon_5"></i></a></li>
                    </ul>
                </div>
                <div class="footer-form">
                    <a class="register-btn" href="{{ route('register') }}">Crear cuenta</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
