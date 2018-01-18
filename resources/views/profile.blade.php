@extends('master')

@section('content')

    <div id="profile-container" class="container" style="direction:rtl;">
        <div class="col-md-12 profile_info">
            <div class=" ">
                <!--<button class="btn settingButton pull-right" style="display:none;">تنظیمات</button>-->
                {{--<button class="btn reportButton pull-right">گزارش تخلف<i class="fa fa-ban"></i></button>--}}

                <!-- <button class="btn pull-right">گزارش تخلف<i class="fa fa-ban"></i></button>
                 <button class="btn repoonez_btn pull-left">دنبال کردن</button>-->
                <h2 class="profile_name">{{$user->name}}</h2>
                <br><br><br>
                <div class="col-md-3" style="text-align:center;">
                    <img class="img-circle profile_picture" src="http://placehold.it/150x150">
                </div>
                <div class="col-md-9" style="text-align:center;vertical-align:middle;">
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                        <h3 class="follow_numbers">{{$post_count}}</h3>
                        <span class="follow_number">پست‌ها</span>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                        <h3 class="follow_numbers">{{count($user->following)}}</h3>
                        <span class="follow_number">following</span>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                        <h3 id="follower-count" class="follow_numbers">{{count($user->followers)}}</h3>
                        <span class="follow_number">follower</span>
                    </div>
                </div>
                @auth()
                    @if (auth()->id() != $user->_id)
                    <div class="pull-right">
                        <br><br><br>
                        <a id="btn-follow" class="btn repoonez_btn followButton pull-left" @if(in_array($user->_id,auth()->user()->following))style="display:none;"@endif href="{{route('user.follow',['id'=>$user->_id])}}">دنبال کردن</a>
                        <a id="btn-unfollow" class="btn unfollowButton pull-left"  @if(!in_array($user->_id,auth()->user()->following))style="display:none;"@endif href="{{route('user.unfollow',['id'=>$user->_id])}}">دنبال نکردن</a>
                    </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="container hr_poonez">
        <br>
    </div>

@endsection
