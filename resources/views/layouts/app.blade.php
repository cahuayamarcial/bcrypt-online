<!doctype html>
<html>
<head>
    @include('layouts.head')
</head>
<body>
    <div id="preloader"></div>
    <div id="header-holder" class="inner-header @yield('contact-header')">
        @include('layouts.navigation')
        @yield('content')
    </div>
    @auth
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Configuración</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('config') }}" id="form-config">
                        <div class="input-group-ml">
                            <label for="name" class="label-ml">Nombre</label>
                            <input id="config_name" name="name" class="form-focus" type="text" placeholder="Ingresar nombre" value="{{ Auth::user()->name }}" required>
                            <p class="error-title hidden" id="error_name"></p>
                        </div>
                        <div class="input-group-ml">
                            <label for="email" class="label-ml">Email</label>
                            <input id="config_email" name="email" class="form-focus" type="email" placeholder="Ingresar email" value="{{ Auth::user()->email }}" required>
                            <p class="error-title hidden" id="error_email"></p>
                        </div>
                        <div class="input-group-ml">
                            <label for="profile" class="label-ml">URL Imagen</label>
                            <input id="config_profile" name="profile" class="form-focus" type="text" placeholder="Ingresar email" value="{{ Auth::user()->profile }}" required>
                            <p class="error-title hidden" id="error_profile"></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn green-btn" id="save-config">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Password -->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cambiar contraseña</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('password.change') }}" id="form-change-password">
                        <div class="input-group-ml">
                            <label for="name" class="label-ml">Antigua actual</label>
                            <input id="password" name="password" class="form-focus" type="password" placeholder="******" required>
                            <p class="error-title hidden" id="error_password"></p>
                        </div>
                        <div class="input-group-ml">
                            <label for="email" class="label-ml">Nueva contraseña</label>
                            <input id="new_password" name="new_password" class="form-focus" type="password" placeholder="******" required>
                            <p class="error-title hidden" id="error_new_password"></p>
                        </div>
                        <div class="input-group-ml">
                            <label for="profile" class="label-ml">Confirmar nueva contraseña</label>
                            <input id="confirm_password" name="confirm_password" class="form-focus" type="password" placeholder="******" required>
                            <p class="error-title hidden" id="error_confirm_password"></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn green-btn" id="save-change-password">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    @endauth
    @yield('others')
    <script src="{{ asset('js/app.min.js') }}"></script>
    @yield('script')
    <script>{!! displayAlert() !!}</script>
</body>
</html>