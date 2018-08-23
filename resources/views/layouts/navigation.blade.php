<nav id="nav" class="navbar navbar-default navbar-full">
    <div class="container-fluid">
        <div class="container container-nav">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="logo-holder" href="{{ url('/') }}">
                            <div class="logo" style="width: 102px;height: 40px;x"></div>
                        </a>
                    </div>
                    <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse" id="bs">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="@yield('active-home')"><a href="{{ url('/') }}">Inicio</a></li>
                            <li><a href="https://github.com/MarzCT/bcrypt-online" target="_blank">Github</a></li>
                            @if (Auth::check())
                            <li class="@yield('active-record')"><a href="{{ url('historial') }}">Historial</a></li>
                            @else
                            <li class="support-button-holder support-dropdown">
                                <a class="support-button" href="{{ url('ingresar') }}">Ingresar</a>
                            </li>
                            @endif
                            @if (Auth::check())
                            <li class="dropdown flex-profile">
                                <picture class="profile-nav">
                                    <img src="{{ \Auth::user()->profile }}" alt="{{ \Auth::user()->name }}">
                                </picture>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <span id="username">{{ \Auth::user()->name }} </span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a data-toggle="modal" href="#myModal">Configuración</a></li>
                                    <li><a data-toggle="modal" href="#changePassword">Cambiar contraseña</a></li>
                                    @if (\Auth::user()->rol == 'admin')
                                        <li><a href="{{ url('admin') }}">cPanel</a></li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}" 
                                            onclick="event.preventDefault(); 
                                            document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>