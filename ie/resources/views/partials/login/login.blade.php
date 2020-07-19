@extends("templates.login-template")
@section("title") ورود کاربر @stop
@section('content')

    <div class="sufee-login d-flex align-content-center flex-wrap" style="text-align: right">
        <div class="container">
            @include('partials.alerts.errors')
            <div class="login-content">
                <div class="login-form">
                    <form action="" method="post" id="log-form" dir="rtl">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="bePink">آدرس ایمیل</label>
                            <input type="email" class="form-control" placeholder="ایمیل را وارد کنید" name="email"
                                   required value="{{isset($email)?$email:''}}">
                        </div>
                        <div class="form-group">
                            <label class="bePink">رمز عبور</label>
                            <input type="password" class="form-control" placeholder="رمز را وارد کنید" name="pass"
                                   required value="{{isset($pass)?$pass:''}}">
                        </div>
                        <div class="checkbox" style="text-align: left">
                            <label class="pull-right">
                                <input type="checkbox" name="rm" {{(isset($rm) && $rm != null)? 'checked' : ''  }}> من
                                را به خاطر بسپار
                            </label>
                            <label class="">
                                <a href="{{route('forgot')}}">رمز عبور را فراموش کردید؟</a>
                            </label>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">ورود به سامانه</button>
                        <div class="register-link m-t-15 text-center">
                            <p>هنوز در سامانه ما حساب نداری؟<a href="{{route('register')}}"> اینجا ثبت نام کن!</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop