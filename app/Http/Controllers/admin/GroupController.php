<?php

namespace App\Http\Controllers\admin;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserGroup;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups = Group::paginate(10);
        $allgroups = Group::all();

        return view('admin.group.index')
            ->with('groups', $groups)
            ->with('allgroups', $allgroups)
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
        $this->authorize('create', Group::class);
        $request->validate([
            "name" => "Required|string"
        ]);

        Group::create([
            "name"=>$request->name
        ]);

        session()->flash('status', 'Created a Group Successfully');

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
        $this->authorize('create', Group::class);
        $group = Group::find($id);
        return view('admin.group.edit')
            ->with('group', $group);
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
        $this->authorize('create', Group::class);
        $request->validate([
            'name' => 'required|string|unique:groups'
        ]);

        $group = Group::find($id);

        $group->name = $request->name;

        $group->save();

        session()->flash('status', "Updated Successfully");

        return redirect()->route('group.index');
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
        $this->authorize('create', Group::class);
        $group = Group::find($id);

        UserGroup::where('group_id', $id)->delete();

        $group->delete();

        session()->flash('status', "Disabled Successfully");

        return redirect()->route('group.index');

    }
}
