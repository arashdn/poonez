<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Sleimanx2\Plastic\Searchable;

class User extends MyAuthenticatable
{
    use Notifiable;
    use searchable;

    public function buildDocument()
    {
        return [
            'id' => $this->_id,
            'name' => $this->name,
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
