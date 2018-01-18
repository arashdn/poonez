<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::findOrFail($id);
        $post_cnt = Post::where('user_id','=',$id)->count();
        return view('profile',['user'=>$user,'post_count'=>$post_cnt]);
    }
}
