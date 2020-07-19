@extends('templates.pages-template')
@section('title') آگهی های فروش@stop
@section('content')

    <div id="commercial-view">
        <i id="rac" style="display: none !important;">{{$com_id}}</i>
        <!-- slider -->
        <div class="row">
            @include('partials.pages.commercial_detail_components.publisher')
            <div class="col-md-8">
            @include('partials.pages.commercial_detail_components.slider')
            <!-- details -->
                @include('partials.pages.commercial_detail_components.details')
                <br><br>
            </div>
        </div>
        <br><br>
    </div>

@stop
@section('template-title') مشاهده آگهی @stop
@section('template-brc') <a href="#" onclick="history.go(-1)" class="btn btn-outline-primary">بازگشت<i class="fa fa-arrow-circle-o-right temp-i" aria-hidden="true"></i></a> @stop
@section('js')
    <script src="{{asset('js/com-detail/custom.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/com-detail/ajax_rate.js')}}" type="text/javascript"></script>
@stop