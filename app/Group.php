<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    protected $fillable = ['name'];

    public function userGroup(){
        return $this->hasMany('App\UserGroup');
    }
}
