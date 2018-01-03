<?php

namespace App\Http\Controllers;

use Config;
use App\Photo;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Response;

class PostController extends Controller
{
    public function add()
    {
        return view("post.add");
    }

    public function store(Request $request)
    {
        $validator = Post::makeValidator($request);
        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $post = new Post();
        $post->content = $request->Content;
        $post->title = $request->title;
        $post->url = $request->get('url');
        $post->user_id = auth()->id();
        $post->public = !empty($request->get('public'));

        $tg = $request->tags;
        str_replace('،',',',$tg);
        str_replace('.',',',$tg);
        $tags = explode(',',$tg);
        $post->tags = $tags;

        $photo = new Photo();
        $file_name = $photo->uploadImage($request);

        $post->image = $file_name;

        $post->save();

        return redirect('/')->with('status', 'پست جدید با موفقیت به پروفایل شما افزوده شد!');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        if (!$post->hasAccess())
            return abort(404);

        $post->load('user');

        return view('post.show',['post' => $post]);
    }

    public function edit(Request $request)
    {
        $post = Post::findOrFail($request->get('pk'));

        if($post->user_id != auth()->id())
            abort(403);


        try
        {
            switch ($request->get('name'))
            {
                case 'post-content':
                    $post->content = $request->get('value');
                    $post->save();
                    break;
                    case 'post-title':
                    $post->title = $request->get('value');
                    $post->save();
                    break;
                default:
                    throw new \Exception('ورودی مشخص نیست');
                    break;
            }

            $res = [
                'status' => 'ok',
                'message' => 'با موفقیت ویرایش شد.'
            ];
            if($request->ajax() || $request->wantsJson())
                return Response::json($res, 200);
            return 'ویرایش شد';
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

    public function delete($id, Request $request)
    {
        $post = Post::findOrFail($id);

        if($post->user_id != auth()->id())
            abort(403);

        try
        {

            $post->delete();
            $res = [
                'status' => 'ok',
                'message' => 'با موفقیت حذف شد.',
                'redirect' =>route('home')
            ];
            session('status','پست با موفقیت حذف شد.');
            if($request->ajax() || $request->wantsJson())
                return Response::json($res, 200);
            return 'ویرایش شد';
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

    public function all()
    {
        sleep(2);
        return Post::with('user')->orderBy('created_at','desc')->paginate(12);
    }

    public function image($id)
    {
        $post = Post::findOrFail($id);

        if (!$post->hasAccess())
            return abort(404);

        $name = $post->image;
        return response()->download(Config::get('global.post.image.path').DIRECTORY_SEPARATOR.$name, null, [], null);
    }

    public function thumbnail($id)
    {
        $post = Post::findOrFail($id);

        if (!$post->hasAccess())
            return abort(404);

        $name = $post->image;
        return response()->download(Config::get('global.post.image.thumbnail_path').DIRECTORY_SEPARATOR.$name, null, [], null);
    }
}
