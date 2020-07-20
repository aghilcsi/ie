@extends('templates.management-template')
@section('template-title')
    مدیریت کاربران
@stop
@section('content')
    <div class="container">
        <div class="card" style="margin-top: 70px;">
            <div class="card-header">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">نام کاربر</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">نقش کاربر</label>
                                <select name="role" class="form-control">
                                    <option value="0">انتخاب کنید...</option>
                                    <option value="1">کاربر سایت</option>
                                    <option value="2">ناظر سایت</option>
                                    <option value="3">مدیر سایت</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">ایمیل کاربر</label>
                                <input type="email" name="email" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="">
                                <button type="submit" class="btn btn-success btn-block" style="margin-top: 30px;">جست و
                                    جو
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table" style="text-align: center">
                    <thead class="">
                    <tr>
                        <th>نام کاربر</th>
                        <th>ایمیل</th>
                        <th>استان</th>
                        <th>جایگاه</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>عقیل صادق</td>
                        <td>aghilcsi@gmail.com</td>
                        <td>قم</td>
                        <td>مدیر</td>
                        <td class="users-opr">
                            <a href="#"><span><img src="{{asset('images/website/eye.png')}}" alt=""></span></a>
                            <a href="#"><span><img src="{{asset('images/website/growth_manager.png')}}" alt=""></span></a>
                            <a href="#"><span><img src="{{asset('images/website/growth_nazer.png')}}" alt=""></span></a>
                            <a href="#"><span><img src="{{asset('images/website/delete.png')}}" alt=""></span></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop