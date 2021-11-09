<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutstationLeader extends Model
{
    //


    protected $table = 'outstation_leaders';

    protected $fillable = ['user_id', 'outstation_id'];
}
