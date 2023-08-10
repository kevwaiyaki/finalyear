<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'Report';
    protected $fillable=[
        'school','name', 'email', 'password',
    ];
}
