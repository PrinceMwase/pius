<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    //
    protected $fillable = ['location', 'status'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
