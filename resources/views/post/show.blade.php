@extends('master')

@section('content')

    <div class="col-md-3">
    </div>
    <div class="col-md-6" style="direction:rtl;" id="post-show-div">
        <br /><br />
        <div class="col-md-12">
            <div class="panel panel-default poonez_panel pins_MAX col-md-12">
                <div class="panel-heading poonez_panel_header">
                    <div class="pull-left">
                        <span><img class="img-rounded" style="border-radius: 50%;width: 50px;height: 50px;" src="http://placehold.it/350x700"></span>
                        &nbsp;<span><a href="{{route('user.profile',['id'=>$post->user->id])}}" style="">{{$post->user->name}}</a></span>
                    </div>
                    @auth
                        <div class="pull-right">
                            @if(auth()->id() == $post->user_id)
                            <a id="btn-poonez" href="{{route('post.edit')}}" data-pk="{{$post->_id}}" data-toggle="tooltip" title="پونز بزن!" data-placement="bottom"><i id="btn-icon-poonez" class="fa @if(!in_array(auth()->id(),$post->pins))fa-thumb-tack @else fa-undo @endif poonez_icon" style=""></i></a>
                            @endif
                            <p></p>
                            <a href="{{route('post.delete',['id'=>$post->_id])}}" id="post-delete" data-toggle="tooltip" title="پست را حذف کن" data-placement="bottom"><i class="fa fa-trash poonez_icon"></i></a>
                        </div>
                    @endauth
                    <br><br><br>
                </div>
                <div>
                    @auth()
                        @if(auth()->id() == $post->user_id)
                            <h1 id="post-title" data-type="text" data-title="عنوان را وارد کنید" data-url="/post" data-pk="{{$post->_id}}">{{$post->title}}</h1>
                        @else
                            <h1 id="post-titlee">{{$post->title}}</h1>
                        @endif
                        @else
                            <h1 id="post-titlee">{{$post->title}}</h1>
                    @endauth
                </div>
                <div class="panel-body col-md-12">
                    <a href="{{$post->url}}">
                        <img class="img-rounded" style="width: 100%; max-width: 800px; max-height: 600px" src="{{route('post.image',['id'=>$post->_id])}}">
                    </a>
                    <br>
                    <br>
                    <span class="pull-right poonez_numbers_forposts"><span id="pin-count">{{$post->pin_count}}</span> <i class="fa fa-thumb-tack"></i></span>
                    <p style="font-size:11px;">
                        @foreach($post->tags as $tag)
                            <span class="muted_text">{{$tag}}</span>&nbsp;&nbsp;
                        @endforeach
                        <br>
                        <br>
                        <span>{{$post->persian_date}}</span>
                    </p>
                    {{--<a data-toggle="modal" data-target="#report" class="btn pull-right" >گزارش تخلف<i class="fa fa-ban"></i></a>--}}
                    {{--<a class="btn repoonez_btn poonez_icon pull-left"><i class="fa fa-thumb-tack"></i>پونز بزن!</a>--}}
                    <br>
                    <br>


                    @auth()
                        @if(auth()->id() == $post->user_id)
                            <p id="post-content" data-type="textarea" data-url="/post" data-pk="{{$post->_id}}" >{{$post->content}}</p>
                        @else
                            <p id="post-contentt" >{{$post->content}}</p>
                        @endif
                        @else
                            <p id="post-contentt" >{{$post->content}}</p>
                            @endauth

                </div>
                <div class="panel-footer poonez_panel_footer col-md-12" style="">
                    <h2>نظرات</h2>
                    <hr>
                    <div class="appned" id="post-comments">
                        @foreach($comments as $comment)
                            <div class="col-md-12">
                                <img class="img-circle" src="http://placehold.it/350x700" width="50px" height="50px">&nbsp;&nbsp;
                                <a href="#">{{$comment->user->name}}</a>
                                <br><br><p>{{$comment->body}}</p>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                    @auth()
                        <div class="col-md-12">
                            <textarea id="sent-comment-body" rows="5" class="form-control poonez_text_area poonez_comment" placeholder="نظر خود را بنویسید" cols=""></textarea>
                            <a href="{{route('comment.store')}}" data-pid="{{$post->_id}}" id="btn-send-comment" class="btn send_comment_btn">ارسال</a>
                        </div>
                    @endauth
                </div>
                {{--<div class="panel-footer poonez_panel_footer col-md-12" style="direction:ltr;">--}}
                {{--<button type="button" class="btn">خواندن</button>--}}
                {{--<!-- <button type="button" class="btn btn-outline-danger tooltip1" style="color:indianred;border-color: indianred;background-color: #fff">خواندن </button>-->--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
@endsection
