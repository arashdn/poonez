<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Sleimanx2\Plastic\Searchable;
use Validator;
use Morilog\Jalali\jDate;

class Post extends MyModel
{
    use SoftDeletes;
    use searchable;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['content','user_id','title','url','tags','image'];

    protected $appends = ['persian_date'];

    public function buildDocument()
    {
        return [
            'id' => $this->_id,
            'title' => $this->title,
            'content' => $this->content,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }

    public function getPersianDateAttribute()
    {
//        return jDate::forge($this->asTimeStamp($this->attributes['created_at']))->format('%Y/%m/%d ');
        return jDate::forge($this->asTimeStamp($this->attributes['created_at']))->ago();
    }

    public function hasAccess()
    {
        if ($this->public)
            return true;
        if (Auth::guest())
            return false;
        $sender = $this->user_id;
        if (auth()->id()== $sender)
            return true; //self post
        if(in_array($sender,auth()->user()->following))
            return true;
        return false;
    }

    public static function makeValidator($request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'bail|required|url',
            'file_name' => 'bail|required|mimes:jpg,jpeg,png,bmp',
            'title' => 'bail|required',
        ]);

        $niceNames = [
            'url' => 'آدرس',
            'file_name' => 'عکس',
            'title' => 'عنوان',
        ];
        $validator->setAttributeNames($niceNames);

        return $validator;
    }
}
