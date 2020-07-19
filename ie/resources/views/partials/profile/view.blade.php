@extends('templates.pages-template')
@section('title') مشاهده پروفایل @stop
@section('template-title') پروفایل شما @stop
@section('content')
    <div class="row">
        <div class="col-md-3">
            <img src="{{$src}}" alt="user-img" class="user-view-profile-img">
        </div>
        <div class="col-md-9">
            <div id="profile-view-rows" class="row">
                <div class="col-md-3" id="profile-name">
                    <span><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                    <span>{{$user->name}}</span>
                </div>
                <div class="col-md-5"></div>
                <div class="col-md-3" id="profile-email">
                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <span>{{$user->email}}</span>
                </div>
            </div>
            <div id="profile-view-rows" class="row">
                <div class="col-md-6" id="profile-tell">
                    <span><i class="fa fa-phone-square" aria-hidden="true"></i></span>
                    <span>{{str_replace(';', ' | ',$user->tel)}}</span>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-3" id="profile-city">
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                    <span>{{$user->city}}</span>
                </div>
            </div>
            <div id="profile-view-rows" class="row">
                <div class="col-md-4" id="profile-twitter">
                    <span><i class="fa fa-twitter" aria-hidden="true"></i></span>
                    <span>{{$user->tw}}</span>
                </div>
                <div class="col-md-4" id="profile-insta">
                    <span><i class="fa fa-instagram" aria-hidden="true"></i></span>
                    <span>{{$user->insta}}</span>
                </div>
                <div class="col-md-4" id="profile-fb">
                    <span><i class="fa fa-facebook-square" aria-hidden="true"></i></span>
                    <span>{{$user->fb}}</span>
                </div>
            </div>
            <div id="profile-view-rows" class="row">
                <div class="col-md-12" id="profile-address">
                    <span><i class="fa fa-address-card" aria-hidden="true"></i></span>
                    <span>{{$user->address}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="{{route('edit_profile')}}" class="btn btn-block btn-secondary"><i class="fa fa-pencil-square-o temp-i" aria-hidden="true"></i>ویرایش پروفایل</a>
            <a href="{{route('main')}}" class="btn btn-block btn-primary"><i class="fa fa-arrow-circle-o-right temp-i" aria-hidden="true"></i>بازگشت به صفحه اصلی </a>
        </div>
    </div>
@stop