<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baptism extends Model
{
    //
    protected $fillable = ['officiator', 'date', 'number'];
    public function user(){
        return $this->belongsTo('App\User');
    }
   
}
