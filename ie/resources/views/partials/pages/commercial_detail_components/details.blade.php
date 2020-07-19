<div class="row" id="com-detail">
    @if(isset($from_outSide))
    <div class="col-md-2"></div>
    <div class="col-md-5">
        <div class="row">
            <p id="com-title"><i class="fa fa-hand-o-left" aria-hidden="true"></i>{{$com->title}}</p>
            <p id="com-brand">{{$com->brand}}</p>
        </div>
        <textarea readonly cols="50" id="com-des">{{$com->description}}</textarea>
        </div>
        <div class="col-md-2"></div>
    @else
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <div class="row">
                <p id="com-title"><i class="fa fa-hand-o-left" aria-hidden="true"></i>{{$com->title}}</p>
                <p id="com-brand">{{$com->brand}}</p>
            </div>
            <textarea readonly cols="50" id="com-des">{{$com->description}}</textarea>

        </div>
        <div class="col-md-2">
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
            <p id="com-price" title="قیمت محصول"><i class="fa fa-money" aria-hidden="true"></i>{{price_format($com->price)}}
                <span>تومان</span></p>
        </div>
        <div class="col-md-2"></div>
    @endif

</div>