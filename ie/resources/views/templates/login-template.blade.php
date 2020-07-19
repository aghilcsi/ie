<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('images/website/international.png')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/login/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('css/login/style.css')}}">
    @yield('css')
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body class="bg-danger">
    <div class="container">
        @yield('content')
    </div>
    <script src="{{asset('js/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/login/main.js')}}" type="text/javascript"></script>
    @yield('js')
</body>
</html>