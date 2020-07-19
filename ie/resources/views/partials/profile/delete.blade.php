<?php include_once public_path('files/jdf.php'); ?>
<?php include_once public_path('files/date.php'); ?>
@extends('templates.pages-template')
@section('title') حذف اکانت @stop
@section('template-title') حذف اکانت @stop
@section('template-brc')
    <?php
        get_today();
    ?>
@stop
@section('content')

    <div class="delete-container">
        <div class="row"><i class="fa fa-exclamation-triangle" aria-hidden="true"
                            style="margin-left: 10px;color: #e1e100 "></i>
            <div>در صورت حذف اکانت تمامی اطلاعات شما و آگهی ها از بین خواهد رفت!</div>
        </div>
        <div class="row">
            <div> آیا از حذف اکانت تان اطمینان دارید؟</div>
        </div>
        <div class="row" style="text-align: left" dir="ltr">
            <form action="" method="post">
                {{csrf_field()}}
                <div>
                    <input type="hidden" name="id" value="{{$id}}">
                    <button type="submit" class="btn btn-danger">بله! پاکش کن</button>
                </div>
            </form>
            <div style="margin-left: 10px;">
                <a class="btn btn-primary" href="{{route('main')}}">خیر منصرف شدم</a>
            </div>
        </div>
    </div>

@stop