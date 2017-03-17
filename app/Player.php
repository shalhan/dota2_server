<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Player extends Authenticatable
{
    use Notifiable;

    protected $primaryKey ="PlayerID";

    protected $fillable =
    [
        'Name', 'UserId', 'Email', 'Password'
    ];

    public $timestamps = false;

    protected $hidden =
    [
        'Password','remember_token'
    ];

    public function getAuthPassword(){
        return $this->Password;
    }

    public function matchplayer(){
        return $this->hasMany('App\MatchPlayer','');
    }

}
