<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

if(env('DB_CONNECTION', 'mongodb') == 'mysql')
{
    class MyModel extends Model
    {

    }
}
else
{
    class MyModel extends Eloquent
    {

    }
}


