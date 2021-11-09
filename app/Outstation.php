<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Outstation extends Model
{
    //
    protected $fillable = ['name',];
    public function user(){
        return $this->hasMany('App\User');
    }

    public function leader(){
        return $this->hasOne('App\OutstationLeader');
    }
    public function payments(){
        return $this->hasMany('App\Payment');
    }
    /**
     * Returns the sum of all payments the outstation made
     * 
     * @param String PaymentType
     * 
     * @return Int Total
     * 
     */
    public function paymentsAdd($PaymentType, $outstation , $request = null ){

        $year = Carbon::parse( now() )->year;
        $paymentType = PaymentType::where('name' , $PaymentType)->first();
        
        $sum = 0;
      
        if(   $request  ){
            
            foreach (
                    $paymentType->payments
                        ->where('outstation_id' , $outstation)
                        ->where('created_at', '>=' ,  $request->from )
                        ->where('created_at', '<=' ,  $request->to )  as $payment

                    ) 
                    {
            
                        $sum += $payment->amount;    
                    }
                return $sum;
        }

    
       

        

        foreach ($paymentType->payments->where('outstation_id' , $outstation)->where('created_at', '>=' , Carbon::createFromDate( $year,1,1 )->toDateTimeString()  )  as $payment) {
            
            $sum += $payment->amount;    
            
        }

       
        return $sum;
    }


}
