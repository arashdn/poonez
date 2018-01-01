<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

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
        $post->Content = $request->Content;
        $post->title = $request->title;
        $post->url = $request->get('url');
        $post->user_id = auth()->id();


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
}
