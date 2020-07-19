<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-7">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"
             data-interval=900000000>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block  {{isset($from_outSide)? 'from-outside' : 'slider-img'}} "
                         src="{{asset('images/commercials/'.$com_id.'/0.jpg')}}"
                         alt="First slide">
                </div>
                @foreach($images as $image)
                    @if($image != "0.jpg")
                        <div class="carousel-item">
                            <img class="d-block  {{isset($from_outSide)? 'from-outside' : 'slider-img'}} "
                                 src="{{asset('images/commercials/'.$com_id.'/'.$image)}}"
                                 alt="Second slide">
                        </div>
                    @endif

                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
               data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
               data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    @if(isset($from_outSide))
        <div class="col-md-3">
            <p id="com-year" title="سال تولید"><i class="fa fa-heartbeat" aria-hidden="true"></i>{{$com->year}}
            </p>
            @if(! isset($from_outSide))
                <p id="com-cat" title="دسته بندی"><i class="fa fa-hashtag" aria-hidden="true"></i>{{$com->category}}
                    _ {{$com->subcategory}}</p>
            @endif
            <p id="com-date" title="تاریخ انتشار"><i class="fa fa-calendar"
                                                     aria-hidden="true"></i>{{jdate("Y/m/d",strtotime($com->date))}}</p>
            @if(! isset($from_outSide))
                <p id="com-time" title="زمان انتشار"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$com->time}}
                </p>
                <p id="com-rate" title="نرخ بازدید"><i class="fa fa-street-view"
                                                       aria-hidden="true"></i>{{$com->rate}}</p>
            @endif
            <p id="com-price" title="قیمت محصول"><i class="fa fa-money"
                                                    aria-hidden="true"></i>{{price_format($com->price)}}
                <span>تومان</span></p>
        </div>
    @else
        <div class="col-md-2"></div>
    @endif
</div>