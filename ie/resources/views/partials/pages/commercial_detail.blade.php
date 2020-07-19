@extends('templates.pages-template')
@section('title') آگهی شما@stop
@section('content')

    <div id="commercial-view">
        <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show" dir="rtl"
             id="del-alert">
            <span class="badge badge-pill badge-warning">warning</span>
            آیا از حذف این آگهی اطمینان دارید؟
            <div style="text-align: left">
                <form action="" method="post" class="row" dir="ltr" style="">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$com_id}}">
                    <div class="row" style="margin-left: 20px">
                        <button type="submit" class="badge badge-pill badge-danger" id="del-alert-y">!بله. حذفش
                            کن
                        </button>
                        <button type="button" class="badge badge-pill badge-info" id="del-alert-n">!خیر منصرف
                            شدم
                        </button>
                    </div>
                </form>
            </div>
        </div>

    @include('partials.pages.commercial_detail_components.slider')
    <!-- details -->
        @include('partials.pages.commercial_detail_components.details')
        <br><br>
    </div>

@stop
@section('template-title') مشاهده آگهی @stop
@section('header-left')
    <a href="{{route('com-edit', ['sklvd' => encode_me($com_id)])}}" class="btn btn-outline-info"><i class="fa fa-pencil-square-o temp-i" aria-hidden="true"></i>ویرایش آگهی</a>
    <div id="del-commercial" style="float: left; margin-right: 10px;"><a href="#" class="btn btn-outline-warning"><i class="fa fa-trash-o temp-i" aria-hidden="true"></i>حذف آگهی</a></div>
@stop
@section('template-brc') <a href="{{route('main')}}" class="btn btn-outline-primary">بازگشت<i class="fa fa-arrow-circle-o-right temp-i" aria-hidden="true"></i></a> @stop
@section('js')
    <script src="{{asset('js/com-detail/custom.js')}}" type="text/javascript"></script>
    @if(isset($from_outSide))
        <script src="{{asset('js/com-detail/ajax_rate.js')}}" type="text/javascript"></script>
    @endif
@stop