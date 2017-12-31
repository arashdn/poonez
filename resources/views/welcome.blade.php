@extends('master')

@section('content')

    <div class="container afterload" style="direction:rtl;">
        <div class="col-md-12" style="direction:rtl;text-align:right"><a href="{{route('post.add')}}" class="fixed-button">ایجاد پست جدید</a></div>
        <div class="col-md-12" id="main_view">
            <div class="row myrow">
                <div class="item">
                    <div class="col-md-12">
                        <div class="panel panel-default poonez_panel">
                            <div class="panel-heading poonez_panel_header">
                                <div class="pull-left">
                                    <span><img class="img-rounded" style="border-radius: 50%;width: 50px;height: 50px;" src="http://placehold.it/350x200"></span>&nbsp;<span><a href="#" style="">@{{post.user.name}}</a></span>
                                </div>
                                <div class="pull-right">
                                    <a><i class="fa fa-thumb-tack poonez_icon tooltip1" style=""><span class="tooltiptext">پونز بزن!</span></i></a>
                                </div>
                                <br><br><br>
                            </div>
                            <div class="panel-body">
                                <img class="img-rounded" style="width: 100%;" src="http://placehold.it/350x200">
                                <span class="pull-right poonez_numbers_forposts">تعداد پونزها<i class="fa fa-thumb-tack"></i></span>
                                <h3>عنوان</h3>
                                <p style="font-size:11px;"><a href="#" class="muted_text"><span>نویسنده :@{{post.user.name}} </span></a> - <span class="muted_text">گوناگون</span> - <span>@{{post.created_at}}</span></p>
                                <p>@{{post.content}}</p>

                            </div>
                            <div class="panel-footer poonez_panel_footer" style="">
                                <a class="btn btn-block">بیشتر</a>
                                <!-- <button type="button" class="btn btn-outline-danger tooltip1" style="color:indianred;border-color: indianred;background-color: #fff">خواندن </button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container beforload" style="display: none">
        <div class="col-md-12" style="text-align:center;margin-top:25%;" id="loader">
            <i class="fa fa-circle-o-notch fa-spin" style="font-size:60px;text-align:center;margin:0 auto;display:block"></i>
            <p style="color:#e74c3c">...درحال بارگذاری</p>
        </div>
    </div>
@endsection
