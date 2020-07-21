<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" class="mgm">
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
<body class="mgm" dir="rtl" style="text-align: right; font-family: 'iran', serif;">
<div class="col-md-12 mgm">
    <div class="row mgm">
        <div class="col-md-2  mgm-sidebar mgm" style="height: auto; text-align: center">
            <div class="mgm-logo-container">
                <img src="{{asset('images/website/international.png')}}" alt="logo">
            </div>
            <div class="mgm-divider"></div>
            <div class="mgm-name">
                <div class="tag">نام کاربری</div>
                <div class="val">عقیل صادق</div>
            </div>
            <div class="mgm-divider"></div>
            <div class="mgm-role">
                <div class="tag">جایگاه شما</div>
                <div class="val">مدیریت</div>
            </div>
            <div class="mgm-divider"></div>
            <div class="item">
                <a href="{{route('mgm_main')}}" class="tag ">داشبورد</a>
            </div>
            <div class="mgm-divider"></div>
            <div class="item">
                <a href="{{route('mgm_users')}}" class="tag ">مدیریت کاربران</a>
            </div>
            <div class="mgm-divider"></div>
            <div class="item">
                <a href="{{route('mgm_category')}}" class="tag ">مدیریت دسته بندی ها</a>
            </div>
            <div class="mgm-divider"></div>
            <div class="item">
                <a href="{{route('main')}}" class="tag exit">خروج از پنل مدیریت</a>
            </div>
            <div class="mgm-divider"></div>
            <div class="item">
                <a href="{{route('logout')}}" class="tag exit">خروج از سایت</a>
            </div>
        </div>
        <div class="col-md-10 mgm-dashboard">
            <div class="col-md-12 mgm-top-bar">
                <div class="col-md-2">جمعه - 1399/04/07</div>
                <div class="col-md-6"></div>
                <div class="col-md-4">@yield('template-title')</div>
            </div>
            <div class="mgm-content-container">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/login/main.js')}}" type="text/javascript"></script>
@yield('js')
</body>
</html>