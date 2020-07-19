@extends('templates.pages-template')
@section('title') ویرایش پروفایل  @stop
@section('template-title') ویرایش اطلاعات کاربری @stop

@section('template-brc') <a href="#" onclick="history.go(-1)" class="btn btn-outline-primary">بازگشت<i class="fa fa-arrow-circle-o-right temp-i" aria-hidden="true"></i></a> @stop
@section('content')

    @include('partials.alerts.errors')
    <div class="" style="width: 15%;height: auto;">
        <img src="{{$src}}" alt="user-id" class="user-edit-profile-img">
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label>عکس پروفایل:</label>
            <input type="file" name="image" accept="image/jpeg">
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>نام</label>
                <input type="text" name="name" class="form-control" value="{{isset($name)?$name:$user->name}}"
                       required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label>شماره تماس</label>
                <input type="text" name="tel" class="form-control" value="{{$tel}}" required>
            </div>
            <div class="form-group col-md-3">
                <label>شماره تماس دوم</label>
                <input type="text" name="tel2" class="form-control" value="{{$tel2}}" placeholder="اختیاری">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label><i class="fa fa-twitter" aria-hidden="true"></i></label>
                <input type="text" name="tw" class="form-control" value="{{isset($tw)?$tw:$user->tw}}"
                       placeholder="اختیاری">
            </div>
            <div class="form-group col-md-2">
                <label><i class="fa fa-instagram" aria-hidden="true"></i></label>
                <input type="text" name="insta" class="form-control"
                       value="{{isset($insta)?$insta:$user->insta}}" placeholder="اختیاری">
            </div>
            <div class="form-group col-md-2">
                <label><i class="fa fa-facebook" aria-hidden="true"></i></label>
                <input type="text" name="fb" class="form-control" value="{{isset($fb)?$fb:$user->fb}}"
                       placeholder="اختیاری">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>آدرس محل سکونت</label>
                <input type="text" class="form-control" name="address"
                       value="{{isset($address)?$address:$user->address}}" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <button class="btn btn-success btn-block">ثبت تغییرات</button>
            </div>
        </div>
    </form>

@stop