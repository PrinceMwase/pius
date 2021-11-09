<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserGroup;

class UserGroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index (){

        $userGroups = User::find(auth()->user()->id)->UserGroup;

       


        return view ('admin.accounts.show')
            ->with('user_groups',  $userGroups)
        ;
    }
    public function store(Request $request){
        
        if (auth()->user()->status === 'inactive' || auth()->user()->role->name != 'member'){
            abort(403, "Not Authorized, Contact Adminstrator");
        }

        $request->validate([
            'group' => 'required|integer'
        ]);

        UserGroup::create([
            'user_id' => auth()->user()->id,
            'group_id' => $request->group 
        ]);



        return redirect()->route('userGroups');
    }

    // un join from a user group

    public function remove ($id){
       
        try {
            UserGroup::where(['group_id' => $id , 'user_id' => auth()->user()->id ])->first()->delete();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('status', 'Error, Again later');
        }
        session()->flash('status', 'Removed from Group successfully');
        return redirect()->back();
    }
}
