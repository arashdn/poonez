@extends('master')

@section('content')

    <div class="col-md-3">
        {{--<br /><br />--}}
        {{--<div class="btn-group-vertical" style="position:fixed;z-index:1;">--}}
            {{--<button type="button" class="fixed-button-circle_Email"><i class="fa fa-google-plus" style="color:#fff;font-size:26px;"></i></button>--}}
            {{--<button type="button" class="fixed-button-circle_facebook"><i class="fa fa-facebook-f" style="color:#fff;font-size:26px;"></i></button>--}}
            {{--<button type="button" class="fixed-button-circle_twitter"><i class="fa fa-instagram" style="color:#fff;font-size:26px;"></i></button>--}}
        {{--</div>--}}
    </div>
    <div class="col- col-md-6" style="direction:rtl;">
        <br /><br />
        <div class="col-md-12">
            <div class="panel panel-default poonez_panel pins_MAX col-md-12">
                <div class="panel-heading poonez_panel_header">
                    <div class="pull-left">
                        <span><img class="img-rounded" style="border-radius: 50%;width: 50px;height: 50px;" src="http://placehold.it/50x50"></span>&nbsp;<span><a href="#" style="">علیرضا شهابی</a></span>
                    </div>
                    <div class="pull-right">
                        <a href="#" data-toggle="tooltip" title="پونز بزن!" data-placement="bottom"><i class="fa fa-thumb-tack poonez_icon" style=""></i></a>
                    </div>
                    <br><br><br>
                </div>
                <div>
                    <h1 id="title-box" data-type="text" data-title="عنوان را وارد کنید">موضوع عکس</h1>
                </div>
                <div class="panel-body col-md-12">
                    <img class="img-rounded" style="width: 100%; max-width: 800px; max-height: 600px" src="http://placehold.it/800x600">
                    <br>
                    <span class="pull-right poonez_numbers_forposts">2.6K <i class="fa fa-thumb-tack"></i></span>
                    <p style="font-size:11px;"><a href="#" class="muted_text"><span>نویسنده : علیرضا شهابی</span></a> - <span class="muted_text">گوناگون</span> - <span>16 فروردین 1396</span></p>
                    <a data-toggle="modal" data-target="#report" class="btn pull-right" >گزارش تخلف<i class="fa fa-ban"></i></a>
                    <a class="btn repoonez_btn poonez_icon pull-left"><i class="fa fa-thumb-tack"></i>پونز بزن!</a>
                    <br>
                    <br>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                </div>
                <div class="panel-footer poonez_panel_footer col-md-12" style="">
                    <h2>نظرات</h2>
                    <hr>
                    <div class="appned">
                        <div class="col-md-12">
                            <img class="img-circle" src="http://placehold.it/350x700" width="50px" height="50px">&nbsp;&nbsp;<a href="#">فلانی</a>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <textarea rows="5" class="form-control poonez_text_area poonez_comment" placeholder="نظر خود را بنویسید" cols=""></textarea>
                        <button class="btn send_comment_btn">ارسال</button>
                    </div>
                </div>
                <div class="panel-footer poonez_panel_footer col-md-12" style="direction:ltr;">
                    <button type="button" class="btn">خواندن</button>
                    <!-- <button type="button" class="btn btn-outline-danger tooltip1" style="color:indianred;border-color: indianred;background-color: #fff">خواندن </button>-->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
@endsection
