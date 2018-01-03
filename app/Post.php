<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Validator;
use Morilog\Jalali\jDate;

class Post extends MyModel
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['content','user_id','title','url','tags'];

    protected $appends = ['persian_date'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

//    public function tags()
//    {
//        return $this->hasMany(Tag::class);
//    }

    public function getPersianDateAttribute()
    {
//        return jDate::forge($this->asTimeStamp($this->attributes['created_at']))->format('%Y/%m/%d ');
        return jDate::forge($this->asTimeStamp($this->attributes['created_at']))->ago();
    }

    public function hasAccess()
    {
        return true;
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
