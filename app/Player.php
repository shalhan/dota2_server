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

    public function update(Array $attributes = array(), Array $options = array()){
        foreach($attributes as $key => $value){
            if(!is_null($value)) $this->{$key} = $value;
        }
        return $this->save();
    }

    public function getAuthPassword(){
        return $this->Password;
    }

    public function matchplayer(){
        return $this->hasMany('App\MatchPlayer');
    }

}
