@extends('master')

@section('content')

    <script>var getPostUrl = "{{route('ajax.post.all')}}"</script>

    <div class="container afterload" style="direction:rtl;" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="col-md-12" style="direction:rtl;text-align:right"><a href="{{route('post.add')}}" class="fixed-button">ایجاد پست جدید</a></div>

        <div class="col-md-12" id="main_view">
            <div class="row myrow">
                <div class="item"  v-for="post in posts">
                    <div class="col-md-12">
                        <div class="panel panel-default poonez_panel">
                            <div class="panel-heading poonez_panel_header">
                                <div class="pull-left">
                                    <span><img class="img-rounded" style="border-radius: 50%;width: 50px;height: 50px;" src="http://placehold.it/350x200"></span>&nbsp;<span><a href="#" style="">@{{post.user.name}}</a></span>
                                    {{--<span class="board_name_on_post">نام برد</span>--}}
                                </div>
                                <div class="pull-right">
                                    {{--<a v-on:click="sidenav"><i class="fa fa-thumb-tack poonez_icon tooltip1" style=""><span class="tooltiptext">پونز بزن!</span></i></a>--}}
                                </div>
                                <br><br><br>
                            </div>
                            <div class="panel-body">
                                <span class="pull-right poonez_numbers_forposts">@{{post.pin_count}}<i class="fa fa-thumb-tack"></i></span>
                                <h3>@{{post.title}}</h3>
                                <img class="img-rounded" style="width: 100%;" v-bind:src="'{{route('post.thumbnail').'/'}}'+post._id">
                                <p style="font-size:11px;">
                                    {{--<a href="#" class="muted_text"><span>نویسنده :@{{post.user.name}} </span></a> - --}}
                                    <br>
                                    <span v-for="item in post.tags"><span class="muted_text">@{{item}}</span> &nbsp;&nbsp;</span>
                                    <br>
                                    <br>
                                    <span>@{{post.persian_date}}</span></p>
                                <p>@{{post.content}}</p>

                            </div>
                            <div class="panel-footer poonez_panel_footer" style="">
                                <a v-bind:href="'{{route('post.show').'/'}}' + post._id" class="btn btn-block">بیشتر</a>
                                <!-- <button type="button" class="btn btn-outline-danger tooltip1" style="color:indianred;border-color: indianred;background-color: #fff">خواندن </button>-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12">
                    <div  v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="10">
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="container beforload" style="display: none">
        <div class="col-md-12" style="text-align:center;margin-top:4%;" id="loader">
            <i class="fa fa-circle-o-notch fa-spin" style="font-size:60px;text-align:center;margin:0 auto;display:block"></i>
            <p style="color:#e74c3c">...درحال بارگذاری</p>
        </div>
    </div>
@endsection
