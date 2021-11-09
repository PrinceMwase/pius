<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = ['name', 'location'];
    /**
     * Relation Definitions
     */
    public function lesson(){
        return $this->belongsTo('App\Lesson');
    }
}
