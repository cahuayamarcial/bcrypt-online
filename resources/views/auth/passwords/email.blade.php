@extends('layouts.auth.app')
@section('title', 'Restablecer contraseña')
@section('content')
<div class="form-login">
    <div class="card-form">
        <div class="card-efect"></div>
        <div class="card-box">
            <div class="card-header-login">
                Restablecer contraseña
            </div>
            <div class="form-login-ml">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="input-group-ml">
                        <input id="email" name="email" class="form-focus" type="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span>
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn-submit-login">Recuperar</button>
                </form>
            </div>
            @if (session('status'))
                <div class="alert-ml alert-success-ml">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
