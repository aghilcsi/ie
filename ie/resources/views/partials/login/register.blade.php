<?php include public_path().'/files/cities.php'?>
@extends('templates.login-template')
@section('title') عضویت در سامانه@stop
@section('js')
    <script src="{{asset('js/login/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/login/custom.js')}}" type="text/javascript"></script>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/login/select2.min.css')}}">
@stop
@section('content')
    <div class="sufee-login d-flex align-content-center flex-wrap"  style="text-align: right">
        <div class="container" >
            @include('partials.alerts.errors')
            <div class="login-content">
                <div class="login-form">
                    <form dir="rtl" id="reg-form" action="" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>نام</label>
                            <input type="text" name="name" class="form-control" placeholder="نام کامل" required value="{{@isset($name)?$name:''}}">
                        </div>
                        <div class="form-group">
                            <label>آدرس ایمیل</label>
                            <input type="email"  name="email" class="form-control" placeholder=" ایمیل" required value="{{isset($email)?$email:''}}">
                        </div>
                        <div class="row">
                            <div class="form-group col-xl-5 col-lg-5">
                                <label>رمز عبور</label>
                                <input type="password" name="pass" class="form-control" placeholder="رمز را وارد کنید" required value="{{isset($pass)?$pass:''}}">
                            </div>
                            <div class="col-xl-1 col-lg-1"></div>
                            <div class="form-group col-xl-6 col-lg-5">
                                <label>تایید رمز</label>
                                <input type="password" name="conform-pass" class="form-control" placeholder="رمز را دوباره وارد کنید" required value="{{isset($conform_pass)?$conform_pass:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xl-5 col-lg-5">
                                <label>شماره همراه</label>
                                <input type="tel" name="tel" class="form-control" placeholder="*********09" required value="{{isset($tel)?$tel:''}}">
                            </div>
                            <div class="col-xl-1 col-lg-1"></div>
                            <div class="form-group col-xl-6 col-lg-5">
                                <label>استان</label>
                                <select class="form-control my-cities" required name="city">
                                    <option value="0">استان شما...</option>
                                    <?php
                                        $cities = get_cities();
                                        var_dump($cities);
                                        foreach ($cities as $mycity){
                                            $selected = (isset($city) && $city == $mycity["code"])? 'selected' : '';
                                        	echo "<option value='".$mycity["code"]."' $selected >".$mycity['name']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>آدرس محل سکونت</label>
                            <input type="text" name="address" class="form-control" placeholder="آدرس را وارد کنید" required value="{{isset($address)?$address:''}}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">ثبت نام</button>
                        <div class="register-link m-t-15 text-center"><br>
                            <p>قبلا ثبت نام کرده اید؟ ? <a href="{{route('login')}}"> ورود به سایت</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop