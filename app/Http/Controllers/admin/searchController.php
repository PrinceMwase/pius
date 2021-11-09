<?php

namespace App\Http\Controllers\admin;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
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
        $q = $request->search;

    
    if ($q != " "){

        $users = User::where("baptism_id","LIKE", "%" . $q . "%")
            ->orWhere("first_name","LIKE", "%" . $q . "%")
            ->orWhere("last_name","LIKE", "%" . $q . "%")
            ->get();
        
        $groups = DB::table('groups')
                    ->join('users', 'groups.supervisor', '=' , 'users.id')
                    ->where('groups.name' , 'LIKE', "%" . $q . "%" )
                    ->orWhere("users.first_name","LIKE", "%" . $q . "%")
                    ->orWhere("users.last_name","LIKE", "%" . $q . "%")
                    ->paginate()
                    ;
                   


        if(count($users) > 0 || count($groups) > 0 ){
            
            return view('admin.accounts.index')
                ->with( 'users' , $users )
                ->with('groups', $groups);
        } else{
            session()->flash('status', 'found no results');
            return redirect()->route('home');
        }

    }

    session()->flash('success', 'found no results');

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
