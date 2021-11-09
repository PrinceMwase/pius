<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outstation;
use App\OutstationLeader;


class OutstationLeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        
        $this->authorize('create', OutstationLeader::class);

        $request->validate([
            "leader" => 'required|integer|unique:outstation_leaders,user_id',
            'outstation' => 'required|integer|unique:outstation_leaders,outstation_id'
        ]);

        OutstationLeader::create(
            [
                'user_id' => $request->leader,
                'outstation_id' => $request->outstation
            ]
        );

        session()->flash('status', "Assigned Outstation Leader succesfully");

        return redirect()->back();
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
        
        try {
            OutstationLeader::where('outstation_id', $id)->first()->delete();
        } catch (\Throwable $th) {
            session()->flash('status', 'Removed outstation leader for ' . Outstation::find($id)->name);
        }

        session()->flash('status', 'No leader for  ' . Outstation::find($id)->name);

        return redirect()->back();
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
