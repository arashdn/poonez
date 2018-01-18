@extends('master')

@section('content')

    <div id="editpost" class="modal fade" role="dialog" style="direction:rtl;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header poonez_panel_header">


                </div>
                <div class="modal-body">
                    <img class="img-rounded" style="width: 100%;" src="http://placehold.it/350x500">
                    <span class="pull-right poonez_numbers_forposts">2.6K <i class="fa fa-thumb-tack"></i></span>
                    <input class="form-control" value="موضوع عکس" />
                    <p style="font-size:11px;"><a href="#" class="muted_text"><span>نویسنده : علیرضا شهابی</span></a> - <span class="muted_text">گوناگون</span> - <span>16 فروردین 1396</span></p>
                    <form>
                        <textarea rows="10" class="form-control poonez_text_area" placeholder="" cols="">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</textarea>
                    </form>

                </div>

            </div>

        </div>
    </div>


    <div class="container" style="direction:rtl;">
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
                        <h3 class="follow_numbers">20</h3>
                        <span class="follow_number">پونز ها</span>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                        <h3 class="follow_numbers">10</h3>
                        <span class="follow_number">دنبال کننده ها</span>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                        <h3 class="follow_numbers">5</h3>
                        <span class="follow_number">دنبال شده ها</span>
                    </div>
                </div>
                <div class="pull-right">
                    <br><br><br>
                    <a class="btn repoonez_btn followButton pull-left" href="/user/follow/">دنبال کردن</a>
                    <a class="btn unfollowButton pull-left"  style="display:none;">دنبال نکردن</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container hr_poonez">
        <br>
    </div>

@endsection
