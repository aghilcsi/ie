<?php include_once public_path('files/date.php')?>
@extends('templates.pages-template')
@section('template-brc')
    {{get_today()}}
    @stop
@section('title')
حذف آگهی
@stop
@section('template-title')
    علت حذف آگهی
    @stop
@section('content')

    <div class="del-res-container">
        <div style="font-weight:bold;">علت حذف آگهی تان چیست؟</div>
        <form action="" method="post" dir="ltr" style="text-align: right">
            <div class="form-controller">
                <label for="rb1">محصول مورد نظرم را فروختم</label>
                <input type="radio" id="rb1" name="delete-reason" checked            value="1">
            </div>
            <div class="form-controller">
                <label for="rb2">!از فروش این محصول منصرف شدم</label>
                <input type="radio" id="rb2" name="delete-reason" value="2">
            </div>
            <div class="form-controller">
                <label for="rb3">:(  کسی این محصول را نخرید </label>
                <input type="radio" id="rb3" name="delete-reason" value="3">
            </div>
            <button type="submit" class="btn btn-danger">ارسال بازخورد و حذف آگهی</button>
        </form>
    </div>

@stop