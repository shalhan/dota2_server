<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =
    [
        'Name', 'UserId', 'Email', 'Password'
    ];

    public $timestamps = false;
}
