<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deanu extends Model
{
    protected $table = 'deanu';
    protected $fillable = [
        'school','name', 'email', 'password',
    ];
}
