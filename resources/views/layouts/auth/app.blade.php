<!doctype html>
<html>
<head>
@include('layouts.head')
</head>
<body class="fullpage">
<div id="preloader"></div>
<div id="form-section" class="container-fluid signin">
    <div class="row">
        <div class="info-slider-holder">
            <div class="website-logo">
                <a href="{{ url('/') }}">
                    <div class="logo" style="width: 122px;height: 50px;"></div>
                </a>
            </div>
            <div class="info-holder">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{  asset('js/app.min.js') }}"></script>
<script>
$(document).ready(function() {  
    $(window).load(function(){
        $('#preloader').fadeOut('slow',function(){
            $(this).remove();
        });
    });
});
</script>
</body>
</html>
