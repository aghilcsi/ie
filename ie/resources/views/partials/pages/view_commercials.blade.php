<?php include_once public_path() . "/files/cities.php"; ?>
<?php include_once public_path() . "/files/encrypt.php"; ?>
@extends('templates.pages-template')
@section('title')آگهی های فروش@stop
@section('template-title') آگهی های فروش@stop
@section('header-left')
    <button class="search-trigger" id="search-commercials"><i class="fa fa-search"></i>
        جست و جوی دوباره
    </button>
@stop
@section('template-brc')
    <a href="{{route('main')}}" class="btn btn-outline-primary">بازگشت<i class="fa fa-arrow-circle-o-right temp-i" aria-hidden="true"></i></a>
@stop
@section('content')
    <div class="filter-data">
        <div class="row">

            @if($cat != '')
                <div class="filter-cat-data">{{'#'.$cat.'_'.$subCat}}</div>
            @endif
            @if($brand)
                <div class="filter-brd-data">{{$brand}}</div>
            @endif
            @if($price_s != '')
                <div class="filter-price-s-data"><i class="fa fa-long-arrow-up"
                                                    aria-hidden="true"></i>{{price_format($price_s)}}
                    <small>تومان</small></div>
            @endif
            @if($price_e != '')
                <div class="filter-price-e-data"><i class="fa fa-long-arrow-down"
                                                    aria-hidden="true"></i>{{price_format($price_e)}}
                    <small>تومان</small></div>
            @endif
            @if($year != '')
                <div class="filter-year-data"><i class="fa fa-long-arrow-up" aria-hidden="true"></i>{{$year}}</div>
            @endif
            @if($com_date != '')
                <div class="filter-date-data"><i class="fa fa-long-arrow-up" aria-hidden="true"></i>{{$com_date}}</div>
            @endif
        </div>
    </div>

    @include('partials.pages.filter')

    <div class="coms-container">
        <!-- com item -->
        @if( count($coms) > 0)
            @foreach($coms as $com)
                <a href="{{route('com_view', ['sklvd' =>  encode_me($com->id)]) }}">
                    <div class="com-item-container" title="برای مشاهده جزئیات کلیک کنید">
                        <div class="row">
                            <!-- info -->
                            <div class="col-md-2">
                                <img class="com-item-image"
                                     src="{{asset("images/commercials/". $com->id . "/0.jpg")}}" alt="">
                            </div>
                            <div class="col-md-6 title-brand-year-container">
                                <!-- title & brand -->
                                <div class="row">

                                    <!-- title -->
                                    <div class="com-title-view">
                                        {{$com->title}}
                                    </div>
                                    <!-- brand -->
                                    <div class="com-brand-view">
                                   <span>
                                       {{$com->brand}}
                                   </span>
                                    </div>
                                </div>
                                <!-- year -->
                                <div class="com-year-view"><i class="fa fa-heartbeat" aria-hidden="true"></i>
                                    {{$com->year}}
                                </div>
                            </div>
                            <!-- price -->
                            <div class="col-md-3">
                                <div class="com-price-view row"><span><i class="fa fa-money"
                                                                         aria-hidden="true"></i>{{price_format($com->price).' '}} <small>تومان</small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="com-item-container">
                <p>نتیجه ای یافت نشد!</p>
            </div>
        @endif
    </div>

@stop
@section('js')
    <script src="{{asset('js/main/ajax.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/main/custom.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/persianDatePicker/persianDatepicker.min.js')}}" type="text/javascript"></script>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset("css/persianDatePicker/persianDatepicker.css")}}">
@stop