<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $table = 'auth';
    protected $fillable=[
        'subject','email','password',
    ];
}
