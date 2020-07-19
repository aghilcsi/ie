<div class="col-md-4 publisher-container" style="text-align: center">
    <div class="publisher-info">اطلاعات منتشر کننده جهت ارتباط</div>
    <div class="publisher-img">
        @if($src == true)
            <img src="{{asset('images/users/'. $user->id .'.jpg')}}" alt="pi">
        @else
            <img src="{{asset('images/website/profile.png')}}" alt="pi">
        @endif
    </div>
    <div class="publisher-name">
        <div><i class="fa fa-user" aria-hidden="true"></i> {{$user->name}} </div>
    </div>
    <div class="publisher-tel">
        <div><i class="fa fa-phone" aria-hidden="true"></i> {{$user->tel}} </div>
    </div>
    <div class="publisher-insta">
        <div><i class="fa fa-instagram" aria-hidden="true"></i> {{$user->insta}}</div>
    </div>
    <div class="publisher-fb">
        <div><i class="fa fa-facebook-square" aria-hidden="true"></i> {{$user->fb}}</div>
    </div>
    <div class="publisher-tw">
        <div><i class="fa fa-twitter" aria-hidden="true"></i> {{$user->tw}} </div>
    </div>
    <div class="publisher-address">
        <div> {{$user->city.'-'.$user->address}}</div>
    </div>
</div>