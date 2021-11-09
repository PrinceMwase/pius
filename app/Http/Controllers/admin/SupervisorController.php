<?php

namespace App\Http\Controllers\admin;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class SupervisorController extends Controller
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
        if (!Gate::allows('manageAcount')){
            abort(403, 'You Cannot assign a Supervisor');
        }
        $request->validate([
            'group' => "Required|integer"
        ]);

        $group = Group::find($request->group);

        $group->supervisor = $id;

        $group->save();

        session()->flash('status', 'Added Supervisor Successfully');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id)
    {
        //
        if (!Gate::allows('manageAcount')){
            abort(403, 'You Cannot Remove a Supervisor');
        }
        $group =  Group::where(['id' => $request->group, 'supervisor' => $id])->first();

        $group->supervisor = null;

        $group->save();

        session()->flash('status', 'removed supervisor succesfully');

        return redirect()->back();
    }
}
