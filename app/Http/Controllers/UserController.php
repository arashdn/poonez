<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Response;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::findOrFail($id);
        $post_cnt = Post::where('user_id','=',$id)->count();
        return view('profile',['user'=>$user,'post_count'=>$post_cnt]);
    }

    public function follow($id , Request $request)
    {
        $user = User::findOrFail($id);
        try
        {

            $user->push('followers',auth()->id(),true);//true to prevent duplicates
            auth()->user()->push('following',$id,true);//true to prevent duplicates
            $user->save();
            auth()->user()->save();
            $res = [
                'status' => 'ok',
                'state' => 'follow',
                'follower_count' => count($user->followers),
                'message' => 'کاربر با موفقیت دنبال شد'
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

    public function unfollow($id , Request $request)
    {
        $user = User::findOrFail($id);
        try
        {

            $user->pull('followers',auth()->id());
            auth()->user()->pull('following',$id);
            $user->save();
            auth()->user()->save();
            $res = [
                'status' => 'ok',
                'state' => 'unfollow',
                'follower_count' => count($user->followers),
                'message' => 'کاربر با موفقیت دنبال نکرده شد'
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
