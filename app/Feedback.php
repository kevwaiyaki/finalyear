<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $fillable=[
        'ticket_no','cod','school','reg','category','subject','feed_back','state',
    ];
}
