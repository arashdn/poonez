@extends('master')

@section('content')
    <script>
        var postAddUrl = "{{route('post.add')}}";
    </script>
    <div id="addBoard" class="modal fade" role="dialog" style="direction:rtl;">
        <div class="modal-dialog">


            <div class="modal-content">
                <div class="modal-header poonez_panel_header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">ساخت بُرد جدید</h2>
                </div>

                <form id="new-board-form" >
                    {{ csrf_field() }}
                    {{--errors--}}
                    <div class="alert alert-danger" style="display: none" id="errors-list-div">
                        <ul id="errors-list">

                        </ul>
                    </div>
                    <div class="modal-body">
                        <label for="board_name" style="" class="control-label">نام بُرد</label>
                        <div class="">
                            <input id="board_name" type="text" class="form-control" name="name" placeholder="نام هر چیزی و هر جایی و ..." required autofocus>
                        </div>
                        <br>
                        <label for="category-id" style="" class="control-label">انتخاب دسته بندی</label>
                        <div class="">
                            <select id="category-id" type="text" style="padding:0px;" class="form-control" name="category_id" required>
                                {{--@foreach($categories as $cat)--}}
                                {{--<option value="{{$cat->id}}">{{ $cat->cat_name }}</option>--}}
                                {{--@endforeach--}}
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer poonez_panel_footer">
                        <div class="pull-left toggle_switch_btn">
                            <i class="fa fa-globe" id="public_flag" style="font-size:25px;"></i>
                            <label class="switch">
                                <input type="checkbox" id="public_private_checkbox" name="public">
                                <div class="slider round" ></div>
                            </label><i class="fa fa-lock" id="private_flag" style="font-size:26px;margin-top:2px;color:#aaa;"></i>
                        </div>

                        <button id = "wait-board-add" class="btn" style="font-size: 24px;display: none">
                            <i class="fa fa-spinner fa-spin"></i>
                        </button>
                        <button id="btn-add-new-board" type="button" class="btn repoonez_btn">ساختن</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                        {{--<button type="submit">send</button>--}}
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="container" style="direction:rtl;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default poonez_panel col-md-12">
                <form method="POST" action="{{route('post.store')}}" id="addPost_form" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <br><br><br>
                        @include('partials.errors')
                    </div>
                    <div class="panel-heading poonez_panel_header">
                        <h1>ایجاد پست جدید</h1>
                    </div>
                    <div class="panel-body col-md-12">
                        <h3>1 . در ابتدا آدرس سایتی که میخواهید پونز کنید را وارد کنید :</h3>


                        {{ csrf_field() }}
                        <input type="text" id="postUrl" name="url" class="form-control" style="direction:ltr;" placeholder="https://google.com/">

                        <hr>
                        <h3>2 . برای پست خود عنوانی بنویسید</h3>
                        <input type="text" name="title" class="form-control" style="direction:rtl;" placeholder="عنوان">
                        <hr>
                        <h3>3 . عکسی برای پست خود انتخاب کنید :</h3>
                        {{--<button type="button" class="choosepic btn repoonez_btn" name="button">انتخاب عکس</button>--}}
                        <input type="file" id="choosepic" name="file_name">
                        <br>
                        <!--<div class="progress" style="margin-top:5px;">
                            <div class="progress-bar progress-bar-poonez progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:80%;">
                            </div>
                        </div>-->
                        {{--<br>--}}
                        <!--  <img class="img-rounded img-responsive" style="margin:0 auto;" src="http://placehold.it/350x700">-->
                        {{--<i class="fa fa-circle-o-notch fa-spin" style="font-size:60px;text-align:center;margin-top:20px;display:block"></i>--}}
                        {{--<br>--}}
                        <hr>
                        <h3>4 . برای پست خود متنی بنویسید :</h3>

                        <textarea name="Content" placeholder="درباره پست خود توضیح کوتاهی بنویسید!" rows="7" class="form-control" style="resize:none;"></textarea>
                        <hr>
                        <h3>5 . برای پست خود تگ انتخاب کنید</h3>
                        <input type="text" name="tags" class="form-control" style="direction:rtl;" placeholder="تگ۱، تگ۲">

                    </div>

                    <div class="panel-footer poonez_panel_footer col-md-12" style="direction:ltr;">
                        <button name="button" class="btn repoonez_btn newPost_send" type="submit">!پونز بزن</button>
                    </div>

                </form>

            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection
