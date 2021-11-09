<?php

namespace App\Http\Controllers;

use App\Outstation;
use App\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        if(Gate::allows('treasurer') || Gate::allows('manageAcount') ){

            $outstations = Outstation::all();
            $paymentTypes = PaymentType::all();

            $request = null;

          return view('report')
            ->with('outstations', $outstations)
            ->with('paymentTypes', $paymentTypes)
            ->with('request', $request)
            
          ;  
        }else{
            abort(403, 'Unauthorized action TO report');
        }
        
    }
    public function retrieve(Request $request){
        // validate 
     
        if(Gate::allows('treasurer') || Gate::allows('manageAcount') ){

            $outstations = Outstation::all();
            $paymentTypes = PaymentType::all();


            $request->validate([
                'to' => 'required|date',
                'from' => 'required|date'
            ]);

            $request->isMethod('POST');

          return view('report')
            ->with('outstations', $outstations)
            ->with('paymentTypes', $paymentTypes)
            ->with('request', $request)
          ;  
        }else{
            abort(403, 'Unauthorized action TO report');
        }
    }
}
