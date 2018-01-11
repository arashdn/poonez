<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

use Response;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $post_id = $request->get('pid');
        $post = Post::findOrFail($post_id);

        if (!$post->hasAccess())
            return abort(403);

        try
        {
            $comment = new Comment();
            $comment->user_id = auth()->id();
            $comment->post_id = $post_id;
            $comment->body = $request->get('body');

            $comment->save();

            $res = [
                'status' => 'ok',
                'message' => 'نظر شما ارسال شد.',
                'body' => $comment->body,
                'user_name' => auth()->user()->name
            ];
            if($request->ajax() || $request->wantsJson())
                return Response::json($res, 200);
            return 'افزوده شد';
        }
        catch (\Exception $e)
        {
            $message = 'خطای پایگاه داده رخ داد.';

            if(config('app.debug'))
                $message .= " \n". $e->getMessage();

            $res = [
                'status' => 'error',
                'message' => $message
            ];
            if($request->ajax() || $request->wantsJson())
                return Response::json($res, 200);
            return 'Error:'.$message;
        }


    }
}
