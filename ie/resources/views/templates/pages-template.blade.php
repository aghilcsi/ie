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
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    @yield('css')
</head>
<body class="container bg-light page-tmp-body">
<div id="right-panel" class="right-panel">
<?php
if (!function_exists('jdate'))
    include_once public_path("files/jdf.php");
if (!function_exists('encode_me'))
    include_once public_path("files/encrypt.php");
if (!function_exists('get_cities'))
    include_once public_path("files/cities.php");
if (!function_exists('get_-today'))
    include_once public_path("files/date.php");
?>

<!-- Header-->
    <header id="header" class="header">
        <div class="header-menu">
            <div class="col-sm-6">
                <div class="header-left" dir="rtl">
                    @yield('header-left')
                </div>
            </div>

            <div class="col-sm-6">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <?php
                        $flag = false;
                        if (isset($id)) {
                            if (file_exists(public_path('images/users/' . $id . '.jpg'))) {
                                $flag = true;
                            }
                        }
                        ?>
                        @if($flag === true)
                            <img class="user-avatar rounded-circle" src="{{asset('images/users/'.$id.'.jpg')}}"
                                 alt="User Avatar">
                        @else
                            <img class="user-avatar rounded-circle" src="{{asset('images/website/profile.png')}}"
                                 alt="User Avatar">
                        @endif
                    </a>
                    <div class="user-menu dropdown-menu" style="text-align: right;">
                        <a class="nav-link my-user-menu" href="{{route('view_profile')}}">مشاهده پروفایل<i
                                    class="fa fa-eye"></i></a>

                        <a class="nav-link my-user-menu" href="{{route('edit_profile')}}">ویرایش پروفایل<i
                                    class="fa fa-pencil-square-o"></i></a>

                        @if($role == '0')
                            <a class="nav-link my-user-menu" href="{{route('delete_account')}}">حذف اکانت<i
                                        class="fa fa-times"></i></a>
                        @else
                            <a class="nav-link my-user-menu" href="{{route('mgm_main')}}">مدیریت سایت<i
                                        class="fa fa-cog" aria-hidden="true"></i> </a>
                        @endif
                        <a class="nav-link my-user-menu" style="color: red" href="{{route('logout')}}">خروج<i
                                    class="fa fa-power-off"></i></a>
                    </div>
                </div>
                <div class="user-area dropdown float-right">
                    <?php
                    if (isset($date)) {
                        $date = strtotime($date);
                        $date = jdate('Y/m/d', $date);
                    }
                    ?>
                    <p id="display-name">{{$display_name}} <small>- شما در تاریخ {{$date}} ثبت نام کردید</small></p>
                </div>

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>
                        @yield('template-title')
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">@yield('template-brc')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3" style="text-align: right" dir="rtl">
        @yield('content')
    </div>
</div>

<script src="{{asset('js/jquery/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/login/main.js')}}" type="text/javascript"></script>
@yield('js')
</body>
</html>