<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use App\PaymentType;
use App\User;
use Illuminate\Support\Facades\Gate;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments = Payment::all();

        
    //    return $payments;
        return view('member.payment.index')
            ->with('payments', $payments)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = PaymentType::all();
        return view('member.payment.create')
            ->with('types', $types)
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Gate::allows('treasurer')){
            
        
        $request->validate([
            'amount' => 'required|integer',
            'other' => 'required'
        ]);

        $type = PaymentType::where('name', $request->other)->first()->id;


        auth()->user()->payments()->create(

            [
                'payment_type_id' => $type,
                'amount' => $request->amount,
                'description' => $request->description ,
                'outstation_id' => auth()->user()->outstation->id
            ]

        );

        
        session()->flash('status', 'Added Payment Successfully');

        return redirect()->back();
        }else{
            abort(403, 'Not Authorized to Add Payments');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
