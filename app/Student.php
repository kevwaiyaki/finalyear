<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable=[
        'school','reg','category','subject','message','status'
    ];
    protected $guarded =[];
    
    public function images(){
        return $this->hasMany(Image::class);
    }
}
