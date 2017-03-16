<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{   
    protected $primaryKey = 'MatchID';
    protected $fillable = [
        'MatchName','MatchType','Date'
    ];
}
