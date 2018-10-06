<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

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

    public function Reply()
    {
        return $this->hasMany('App\Reply','user_id');
    }

    public function Post()
    {
        return $this->hasMany('App\Post','user_id');
    }

    public function Comment()
    {
        return $this->hasMany('App\Comment','user_id');
    }

    public function Bid()
    {
        return $this->hasMany('App\Bid','user_id');
    }

}
