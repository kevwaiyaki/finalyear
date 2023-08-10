<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'reply';
    protected $fillable=[
        'cod','codemail','email','ticket_no','school','reg','category','subject','message','status'
    ];
}
