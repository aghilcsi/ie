@extends('templates.pages-template')
@section('title')
    @if(isset($com_edit))
        تغییر اطلاعات آگهی
    @else
        انتشار آگهی جدید
    @endif
@stop
@section('content')

    @include('partials.alerts.errors')
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        @if(isset($com_edit))
            <input type="hidden" name="id" value="{{encode_me($com_id)}}">
        @endif
        <div class="row">
            <div class="form-group col-md-5 col-lg-6 col-sm-12">
                <label>عنوان</label>
                <input type="text" name="title" class="form-control" placeholder="عنوان کالا" required
                       value="{{@isset($title)?$title:''}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4 col-lg-6 col-sm-3">
                <label>برند</label>
                <input type="text" name="brand" class="form-control" placeholder="" required
                       value="{{@isset($brand)?$brand:''}}">
            </div>
            <div class="form-group col-md-4 col-lg-5 col-sm-3">
                <label>سال تولید</label>
                <input type="number" name="year" class="form-control" placeholder="سال ساخت محصول" required
                       value="{{@isset($year)?$year:''}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-5 col-lg-6 col-sm-12">
                <label>توضیحات بیشتر (در صورت نیاز)</label>
                <textarea data-emojiable="true" id="com-exp-textarea" name="description" cols="30" rows="10"
                          class="form-control col-md-12 col-lg-12">@if(isset($description)){{$description}}@endif</textarea>

            </div>
            <div class="form-group col-md-5 col-lg-5 col-sm-12">
                <div>
                    <label>قیمت</label>
                    <input type="number" required name="price" value="{{isset($price)?$price:''}}"
                           class="form-control" placeholder="قیمت به تومان">
                </div>
                <br>
                @if(!isset($com_edit))
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>دسته بندی اصلی</label>
                            <select name="cat" class="form-control" id="com-form-cat">
                                <option value="0">انتخاب کنید</option>
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>زیر دسته بندی</label>
                            <select name="subcat" class="form-control" id="com-form-subcat">
                                <option value="0">انتخاب کنید</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div>
                        <label>تصویر محصول</label>
                        <input type="file" multiple name="images[]" value="{{isset($images)?$images:''}}">
                    </div>
                @endif
            </div>
        </div>
        <div class="text-center">
            @if(isset($com_edit))
                <button type="submit" class="btn btn-success col-lg-6 col-md-12">ثبت تغییرات</button>
            @else
                <button type="submit" class="btn btn-success col-lg-6 col-md-12">ثبت آگهی</button>
            @endif
        </div>
    </form>

@stop
@section('template-title') انتشار آگهی جدید @stop
@section('template-brc') <a href="#" onclick="history.go(-1)" class="btn btn-outline-primary"> بازگشت<i
            class="fa fa-arrow-circle-o-right temp-i" aria-hidden="true"></i></a> @stop
@section('js')
    @if(!isset($com_edit))
        <script src="{{asset('js/category_ajax/ajax.js')}}" type="text/javascript"></script>
    @endif

@stop
