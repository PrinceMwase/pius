<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funeral extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
   
}
