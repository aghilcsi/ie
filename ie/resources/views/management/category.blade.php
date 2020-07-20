@extends('templates.management-template')
@section('template-title')
    مدیریت دسته بندی و زیر دسته بندی ها
@stop
@section('content')

    <div class="new-cat">
        <form action="{{action('managmentController@show_category_page')}}" method="get">
            {{csrf_field()}}
            <div class="form-group ">
                <input type="text" class="form-control" placeholder="دسته بندی جدید">
            </div>
            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>
    </div>
    <hr>
    <div class="cats-container">
        <div class="cat-area">
            <div class="col-md-12">
                <div class="category">
                    <div class="row">
                        <div class="cat col-md-4">پوشاک</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">شلوار جین</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">پیراهن</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">کمربند</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="hidden" name="cat" value="1">
                                        <input type="text" name="subcat" class="form-control subcat-input"
                                               placeholder="زیر دسته بندی جدید">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class=" btn btn-success subcat-button">ثبت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="category">
                    <div class="row">
                        <div class="cat col-md-4">پوشاک</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">شلوار جین</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">پیراهن</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">کمربند</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="hidden" name="cat" value="1">
                                        <input type="text" name="subcat" class="form-control subcat-input"
                                               placeholder="زیر دسته بندی جدید">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class=" btn btn-success subcat-button">ثبت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="category">
                    <div class="row">
                        <div class="cat col-md-4">پوشاک</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">شلوار جین</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">پیراهن</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">کمربند</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="hidden" name="cat" value="1">
                                        <input type="text" name="subcat" class="form-control subcat-input"
                                               placeholder="زیر دسته بندی جدید">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class=" btn btn-success subcat-button">ثبت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="category">
                    <div class="row">
                        <div class="cat col-md-4">پوشاک</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">شلوار جین</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">پیراهن</div>
                    </div>
                    <div class="row">
                        <div class="subcat col-md-3">کمربند</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="hidden" name="cat" value="1">
                                        <input type="text" name="subcat" class="form-control subcat-input"
                                               placeholder="زیر دسته بندی جدید">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class=" btn btn-success subcat-button">ثبت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            </div>


        </div>
    </div>
    <div class="new-cat">
        <form action="" method="post">
            <div class="form-group ">
                <input type="text" class="form-control" placeholder="دسته بندی جدید">
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-mgm-last">ثبت</button>
            </div>
        </form>
    </div>

@stop

@section('js')
    <script>
        $(function () {
            $(window).unload(function () {
                let scrollPosition = $("div#element").scrollTop();
                localStorage.setItem("scrollPosition", scrollPosition);
            });
            if (localStorage.scrollPosition) {
                $("div#element").scrollTop(localStorage.getItem("scrollPosition"));
            }
        });
    </script>
@stop