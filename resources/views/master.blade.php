<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
                        <h1 class="modal-title ">اعلانات</h1>
                    </div>
                    <div class="modal-body row">
                        <div class="container-fluid">
                            <div class="col-md-12 notfications_content">
                                <h2>امروز</h2>
                                <hr>
                                <div class="col-md-12">
                                    <span><i class="fa fa-circle" style="font-size:10px;"></i></span>&nbsp;&nbsp;<img class="img-circle" src="http://placehold.it/50x50" style="width:50px;height:50px;">&nbsp;&nbsp;&nbsp;<span><a href="#">فلانی</a></span>&nbsp;&nbsp;&nbsp;<span class="notfication_p">پست جدید فلانی رو ببینید</span>&nbsp;&nbsp;<span class="time">4 ساعت پیش</span>&nbsp;<a href="#"><i class="fa fa-angle-left next_to_icon" style=""></i></a>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <span><i class="fa fa-circle" style="font-size:10px;"></i></span>&nbsp;&nbsp;<img class="img-circle" src="http://placehold.it/50x50" style="width:50px;height:50px;">&nbsp;&nbsp;&nbsp;<span><a href="#">فلانیان</a></span>&nbsp;&nbsp;&nbsp;<span class="notfication_p">فلانیان شما رو فالو کرده</span>&nbsp;&nbsp;<span class="time">4 ساعت پیش</span>&nbsp;<a href="#"><i class="fa fa-angle-left next_to_icon" style=""></i></a>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <span><i class="fa fa-circle" style="font-size:10px;"></i></span>&nbsp;&nbsp;<img class="img-circle" src="http://placehold.it/50x50" style="width:50px;height:50px;">&nbsp;&nbsp;&nbsp;<span><a href="#">فلانی</a></span>&nbsp;&nbsp;&nbsp;<span class="notfication_p">پست جدید فلانی رو ببینید</span>&nbsp;&nbsp;<span class="time">4 ساعت پیش</span>&nbsp;<a href="#"><i class="fa fa-angle-left next_to_icon" style=""></i></a>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <span><i class="fa fa-circle" style="font-size:10px;"></i></span>&nbsp;&nbsp;<img class="img-circle" src="http://placehold.it/50x50" style="width:50px;height:50px;">&nbsp;&nbsp;&nbsp;<span><a href="#">فلانیان</a></span>&nbsp;&nbsp;&nbsp;<span class="notfication_p">فلانیان شما رو فالو کرده</span>&nbsp;&nbsp;<span class="time">4 ساعت پیش</span>&nbsp;<a href="#"><i class="fa fa-angle-left next_to_icon" style=""></i></a>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <span><i class="fa fa-circle" style="font-size:10px;"></i></span>&nbsp;&nbsp;<img class="img-circle" src="http://placehold.it/50x50" style="width:50px;height:50px;">&nbsp;&nbsp;&nbsp;<span><a href="#">فلانی</a></span>&nbsp;&nbsp;&nbsp;<span class="notfication_p">پست جدید فلانی رو ببینید</span>&nbsp;&nbsp;<span class="time">4 ساعت پیش</span>&nbsp;<a href="#"><i class="fa fa-angle-left next_to_icon" style=""></i></a>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <span><i class="fa fa-circle" style="font-size:10px;"></i></span>&nbsp;&nbsp;<img class="img-circle" src="http://placehold.it/50x50" style="width:50px;height:50px;">&nbsp;&nbsp;&nbsp;<span><a href="#">فلانیان</a></span>&nbsp;&nbsp;&nbsp;<span class="notfication_p">فلانیان شما رو فالو کرده</span>&nbsp;&nbsp;<span class="time">4 ساعت پیش</span>&nbsp;<a href="#"><i class="fa fa-angle-left next_to_icon" style=""></i></a>
                                    <hr>
                                </div>
                                <h2>دیروز</h2>
                                <hr>
                                <div class="col-md-12">
                                    &nbsp;&nbsp;<img class="img-circle" src="http://placehold.it/50x50" style="width:50px;height:50px;">&nbsp;&nbsp;&nbsp;<span><a href="#">فلانی</a></span>&nbsp;&nbsp;&nbsp;<span class="notfication_p">پست جدید فلانی رو ببینید</span>&nbsp;&nbsp;<span class="time">4 ساعت پیش</span>&nbsp;<a href="#"><i class="fa fa-angle-left next_to_icon" style=""></i></a>
                                    <hr>
                                </div>
                                <h2>2 روز پیش</h2>
                                <hr>
                                <div class="col-md-12">
                                    &nbsp;&nbsp;<img class="img-circle" src="http://placehold.it/50x50" style="width:50px;height:50px;">&nbsp;&nbsp;&nbsp;<span><a href="#">فلانی</a></span>&nbsp;&nbsp;&nbsp;<span class="notfication_p">پست جدید فلانی رو ببینید</span>&nbsp;&nbsp;<span class="time">4 ساعت پیش</span>&nbsp;<a href="#"><i class="fa fa-angle-left next_to_icon" style=""></i></a>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    &nbsp;&nbsp;<img class="img-circle" src="http://placehold.it/50x50" style="width:50px;height:50px;">&nbsp;&nbsp;&nbsp;<span><a href="#">پونز</a></span>&nbsp;&nbsp;&nbsp;<span class="notfication_p">5 دنیای جدید در انتظار شماست</span>&nbsp;&nbsp;<span class="time">4 ساعت پیش</span>&nbsp;<a href="#"><i class="fa fa-angle-left next_to_icon" style=""></i></a>
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
            <form>
                <input type="search" placeholder="!دنیا خودت رو کشف کن" />
                <button type="submit" class="btn">پیدا کن</button>
            </form>
        </div>
    </div>
    <nav class="" style="direction:rtl;">
        <div class="container header">
            <div class="col-md-12 brand_col">
                <a href="#" class="poonez_brand"><i class="fa fa-thumb-tack"></i>پونز</a>
            </div>
            <br>
            <div class="btn_group">
                <!--  <button class="btn sign_in_btn"><i class="fa fa-unlock-alt"></i>ورود</button>
                  <button class="btn sign_up_btn"><i class="fa fa-user-plus"></i>ثبت نام</button>-->
                <button class="btn myprofile_btn"><i class="fa fa-user-circle-o"></i>پروفایل من</button>
                <button class="btn mymessages_btn" data-toggle="modal" data-target="#myModal" style="position:relative;"><i class="fa fa-commenting-o"></i>اعلانات&nbsp;<span class="btn_badge" style="">6</span></button>
                <button class="btn explore_btn"><i class="fa fa-map-signs"></i>گشتن</button>
                <button class="btn search_btn"><i class="fa fa-search"></i>جست وجو</button>
            </div>
        </div>
    </nav>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
