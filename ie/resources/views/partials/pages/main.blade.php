<?php if (!function_exists('jdate'))
    include_once public_path("files/jdf.php"); ?>
<?php if (!function_exists('encode_me'))
    include_once public_path("files/encrypt.php"); ?>
<?php if (!function_exists('get_cities'))
    include_once public_path("files/cities.php"); ?>
<?php if (!function_exists('get_today'))
    include_once public_path("files/date.php"); ?>
@extends('templates.pages-template')
@section('title') آگهی های شما@stop
@section('template-title') آگهی های شما @stop
@section('template-brc')
    <?php
        get_today();
    ?>
@stop
@section('content')

    @include('partials.pages.filter')
    <div class="row">

        @if(isset($commercials) && count($commercials) > 0)
            @foreach($commercials as $commercial)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a href="{{route('show_my_com',['sklvd' => encode_me($commercial->id) ])}}">
                        <div class="card">
                            <div class="card-header" style="text-align: center">
                                <div><img src="{{asset('images/commercials/'.$commercial->id.'/0.jpg')}}" alt=""
                                          class="commercial-image"></div>
                            </div>
                            <div class="card-body">
                                <div class="text-center commercial-title">{{$commercial->title}}</div>
                                <div class="float-left commercial-price"><i class="fa fa-money"
                                                                            aria-hidden="true"></i>{{price_format($commercial->price)}}
                                    تومان
                                </div>
                                <div class="float-right commercial-date"><i class="fa fa-calendar"
                                                                            aria-hidden="true"></i>{{jdate('Y/m/d', strtotime($commercial->date))}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif

        <div class="col-sm-6 col-md-4 col-lg-4">
            <a href="{{route('add_commercial')}}">
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <div><img src="{{asset('images/website/add.png')}}" alt=""
                                  class="title-commercial-image"></div>
                    </div>
                    <div class="card-body">
                        <div class="text-center add-commercial-title">افزودن آگهی جدید</div>
                        <div class="text-center commercial-description">برای فروش بهتر از عکس های متنوع و
                            توضیحاتی شفاف استفاده کنید
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

@stop
@section('header-left')
    <button class="search-trigger" id="search-commercials"><i class="fa fa-search"></i>جست و جو در آگهی ها
    </button>
@stop
@section('js')
    <script src="{{asset('js/main/ajax.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/main/custom.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/persianDatePicker/persianDatepicker.min.js')}}" type="text/javascript"></script>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset("css/persianDatePicker/persianDatepicker.css")}}">
@stop