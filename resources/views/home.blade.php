@extends('master')

@section('content')
    <div id="addBoard" class="modal fade" role="dialog" style="direction:rtl;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header poonez_panel_header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">ساخت بُرد جدید</h2>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="board_name" style="" class="control-label">نام بُرد</label>
                        <div class="">
                            <input id="board_name" type="text" class="form-control" name="name" placeholder="نام هر چیزی و هر جایی و ..." required autofocus>
                        </div>
                        <br>
                        <label for="category" style="" class="control-label">انتخاب دسته بندی</label>
                        <div class="">
                            <select id="category" type="text" style="padding:0px;" class="form-control" name="name" required>
                                <option>هنر</option>
                                <option>نقاشی</option>
                                <option>اخبار</option>
                                <option>هرچیزی</option>
                                <option>یه چیزی</option>

                            </select>
                        </div>
                    </form>

                </div>
                <div class="modal-footer poonez_panel_footer">
                    <div class="pull-left toggle_switch_btn">
                        <i class="fa fa-globe" id="public_flag" style="font-size:25px;"></i>
                        <label class="switch">
                            <input type="checkbox" id="public_private_checkbox">
                            <div class="slider round" ></div>
                        </label><i class="fa fa-lock" id="private_flag" style="font-size:26px;margin-top:2px;color:#aaa;"></i>
                    </div>
                    <button type="button" class="btn repoonez_btn" data-dismiss="modal">ساختن</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-12 background-sidenav"></div>
    <div class="col-md-12 sidenav" id="mysidenav" >
        <a href="#" class="closebtn pull-right">&times;</a>
        <br>
        <br>
        <button data-toggle="modal" class="btn-block btn repoonez_btn" data-target="#addBoard">ساخت برد جدید</button>
        <br>
        <div class=" col-md-12 col-sm-12 board_col board_change_col select_post_add_board">
            <i class="fa fa-check select_board_icon_sidenav "></i>
            <i class="fa fa-globe public_private_icon"></i>
            <img src="http://placehold.it/350x200" class="img-responsive img-rounded">
            <h2 class="profile_link profile_link_input"><a href="#">نام برد</a></h2>
            <span class="follow_number pull-right change_btn">5 پونز</span>
            <div class="delete"></div>
        </div>
        <div class="col-md-12 col-sm-12 board_col board_change_col select_post_add_board">
            <i class="fa fa-check select_board_icon_sidenav"></i>
            <i class="fa fa-globe public_private_icon"></i>
            <img src="http://placehold.it/350x200" class="img-responsive img-rounded">
            <h2 class="profile_link profile_link_input"><a href="#">نام برد</a></h2>
            <span class="follow_number pull-right change_btn">5 پونز</span>
            <div class="delete"></div>
        </div>
        <div class=" col-md-12 col-sm-12 board_col board_change_col select_post_add_board">
            <i class="fa fa-check select_board_icon_sidenav"></i>
            <i class="fa fa-lock public_private_icon"></i>
            <img src="http://placehold.it/350x200" class="img-responsive img-rounded">
            <h2 class="profile_link profile_link_input"><a href="#">نام برد</a></h2>
            <span class="follow_number pull-right change_btn">5 پونز</span>
            <div class="delete"></div>
        </div>
        <div class=" col-md-12 col-sm-12 board_col board_change_col select_post_add_board">
            <i class="fa fa-check select_board_icon_sidenav"></i>
            <i class="fa fa-lock public_private_icon"></i>
            <img src="http://placehold.it/350x200" class="img-responsive img-rounded">
            <h2 class="profile_link profile_link_input"><a href="#">نام برد</a></h2>
            <span class="follow_number pull-right change_btn">5 پونز</span>
            <div class="delete"></div>
        </div>
        <div class="col-md-12 col-sm-12 board_col board_change_col select_post_add_board">
            <i class="fa fa-check select_board_icon_sidenav"></i>
            <i class="fa fa-lock public_private_icon"></i>
            <img src="http://placehold.it/350x200" class="img-responsive img-rounded">
            <h2 class="profile_link profile_link_input"><a href="#">نام برد</a></h2>
            <span class="follow_number pull-right change_btn">5 پونز</span>
            <div class="delete"></div>
        </div>
        <div class="col-md-12 col-sm-12 board_col board_change_col select_post_add_board">
            <i class="fa fa-check select_board_icon_sidenav"></i>
            <i class="fa fa-lock public_private_icon"></i>
            <img src="http://placehold.it/350x200" class="img-responsive img-rounded">
            <h2 class="profile_link profile_link_input"><a href="#">نام برد</a></h2>
            <span class="follow_number pull-right change_btn">5 پونز</span>
            <div class="delete"></div>
        </div>
    </div>
    <div class="container afterload" style="direction:rtl;">
        <div class="col-md-12" style="direction:rtl;text-align:right"><a href="#" class="fixed-button">ایجاد پست جدید</a></div>
        <div class="col-md-12" id="main_view">
            <div class="row myrow" v-cloak>
                <div class="item"  v-for="post in posts">
                    <div class="col-md-12">
                        <div class="panel panel-default poonez_panel">
                            <div class="panel-heading poonez_panel_header">
                                <div class="pull-left">
                                    <span><img class="img-rounded" style="border-radius: 50%;width: 50px;height: 50px;" src="http://placehold.it/350x200"></span>&nbsp;<span><a href="#" style="">@{{post.user.name}}</a></span>
                                    <span class="board_name_on_post">نام برد</span>
                                </div>
                                <div class="pull-right">
                                    <a v-on:click="sidenav"><i class="fa fa-thumb-tack poonez_icon tooltip1" style=""><span class="tooltiptext">پونز بزن!</span></i></a>
                                </div>
                                <br><br><br>
                            </div>
                            <div class="panel-body">
                                <img class="img-rounded" style="width: 100%;" v-bind:src="post.photo.image_url">
                                <span class="pull-right poonez_numbers_forposts">تعداد پونزها<i class="fa fa-thumb-tack"></i></span>
                                <h3>موضوع رو فراموش کردیم بزاریم...!!!</h3>
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
    <div class="container beforload">
        <div class="col-md-12" style="text-align:center;margin-top:25%;" id="loader">
            <i class="fa fa-circle-o-notch fa-spin" style="font-size:60px;text-align:center;margin:0 auto;display:block"></i>
            <p style="color:#e74c3c">...درحال بارگذاری</p>
        </div>
    </div>
@endsection
