<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchPlayer extends Model
{
    public $table = 'matchplayers';
    protected $primaryKey = 'MatchPlayerID';
    protected $fillable = [
        'MatchID', 'PlayerID'
    ];

    public $timestamps = false;

    public function match(){
        return $this->belongsTo('App\Match','MatchID');
    }

    public function player(){
       return $this->belongsTo('App\Player', 'PlayerID');
    }
}
