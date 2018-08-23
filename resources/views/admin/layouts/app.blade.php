<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" type="image/x-icon" href="{{ url('images/ico.png') }}">
    <meta itemprop="image" content="https://image.prntscr.com/image/WPnTd2CSS7aISahJrmurHQ.png">
    <meta name='description' content='Aprovecha al máximo esta hertramienta GRATIS! encripta ahora mismo tus textos.' />
    <meta name='keywords' content='Hash, bcrypt, bcrypt online, bcrypt laravel, bcrypt online laravel, hash generator, generador hash, encriptar, contraseña, laravel, laravel seguridad, contraseñas, bcrypt generador, generador hash, generador bcrypt online' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" />
    @yield('css')
</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.navigation')
        <div class="main-panel">
            <!-- Navbar -->
            @include('admin.layouts.header')
            <!-- End Navbar -->
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>
<script src="{{ url('assets/js/app.min.js') }}"></script>
@yield('script')
</html>