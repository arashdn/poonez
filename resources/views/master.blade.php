<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'پونز') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div id="app">
    <div class="col-md-12" style="direction:rtl;">
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header poonez_panel_header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h1 class="modal-title ">نتایج</h1>
                    </div>
                    <div class="modal-body row">
                        <div class="container-fluid">
                            <hr>
                            <div id="search-result-wrapper" class="col-md-12 notfications_content">
                                {{--<h2>امروز</h2>--}}
                                <div class="col-md-12 search-result-item">
                                    <span><i class="fa fa-circle" style="font-size:10px;"></i></span>&nbsp;&nbsp;
                                    <img class="img-circle" src="http://placehold.it/50x50" style="width:50px;height:50px;">&nbsp;&nbsp;&nbsp;
                                    <span><a href="#">فلانی</a></span>&nbsp;&nbsp;&nbsp;
                                    <span class="notfication_p">پست جدید فلانی رو ببینید</span>&nbsp;&nbsp;
                                    <a href="#">
                                    <i class="fa fa-angle-left next_to_icon" style=""></i>
                                    </a>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer poonez_panel_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div id="search">
            <form id="search-form" action="{{route('search')}}">
                <input id="search-input" type="search" autocomplete="off" placeholder="!دنیای خودت رو کشف کن" />
                <button type="submit" class="btn">پیدا کن</button>
            </form>
        </div>
    </div>
    <nav class="" style="direction:rtl;">
        <div class="container header">
            <div class="col-md-12 brand_col">
                <a href="{{route('home')}}" class="poonez_brand"><i class="fa fa-thumb-tack"></i>پونز</a>
            </div>
            <br>
            <div class="btn_group">
                @guest
                    <a href="{{route('login')}}" class="btn sign_in_btn"><i class="fa fa-unlock-alt"></i>ورود</a>
                    <a  href="{{route('register')}}" class="btn sign_up_btn"><i class="fa fa-user-plus"></i>ثبت نام</a>
                @else
                    <a href="{{route('user.profile',['id'=>auth()->id()])}}" class="btn myprofile_btn"><i class="fa fa-user-circle-o"></i>پروفایل من</a>
                @endguest
                {{--<a class="btn mymessages_btn" data-toggle="modal" data-target="#myModal" style="position:relative;"><i class="fa fa-commenting-o"></i>اعلانات&nbsp;<span class="btn_badge" style="">6</span></a>--}}
                {{--<button class="btn explore_btn"><i class="fa fa-map-signs"></i>گشتن</button>--}}
                <a class="btn search_btn"><i class="fa fa-search"></i>جست‌وجو</a>
                @auth
                    <a class="btn logout_btn" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        <i class="fa fa-user-plus"></i>خروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endauth
            </div>
        </div>
    </nav>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
