<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
</head>
<body>
    <center>
        <div class="login-logo"></div>

        <div class="login-box">
            @yield('content')

            <div class="close">
                <a href="{{ asset('blog') }}"><i class="fa fa-times"></i></a>
            </div>
        </div>

        <div class="login-footer">
            <p><i>&copy; 2017 Pham Huy Hoang</i></p>
        </div>
    </center>

    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>

