<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'payment_type_id',
        'amount',
        'description',
        'outstation_id'
    ];

    public function type(){
        return $this->belongsTo( 'App\PaymentType' );
    }

    public function outstation(){
        return $this->belongsTo('App\Outstation');
    }
}
