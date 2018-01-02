<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Post extends MyModel
{
    protected $fillable = ['content','user_id','title','url','tags'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function has_access($user_id)
    {

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
