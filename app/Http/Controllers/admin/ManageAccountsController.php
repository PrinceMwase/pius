<?php

namespace App\Http\Controllers\admin;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;

class ManageAccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
   

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('manageAcount')) {
      
            //
            $users = User::paginate(15);
            return view ('admin.accounts.index')
                ->with('users', $users)
            ;

        }else{

            session()->flash('success', 'you are not allowed to view that page');
            return redirect()->route('home');
        }

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
     
        $user = User::find($id);

        

        $this->authorize('view', $user);
        //
        return view ('admin.accounts.show');
        
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
        if (!Gate::allows('manageAcount')){
            abort(403, 'You are not authorized to view this page');
        }
        $user = User::find($id);
        $roles = Role::all();
        $groups = Group::all();
        return view('admin.accounts.edit')
            ->with('roles', $roles)
            ->with('groups', $groups)
            ->with('user', $user);
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
        if(Gate::allows('manageAccount')){
             $request->validate([
            'role' => "required|integer"
            ]);
            $user = User::find ($id);

            $user->role_id = $request->role;

            $user->save();

            session()->flash('status', "updated the user's role successfully");

            return redirect()->back();
        }
        else{
            abort(403, 'Not Authorized for this action' );
        }
       


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
    public function disable($id){

        $this->authorize('create', Outstation::class);
        
        $user = User::find($id);

        if( $user->status == 'active' ){
            $user->status = 'inactive';
            $user->save();
            session()->flash('status', "disabled the account successfully");

            return redirect()->back();
        }else{
            $user->status = 'active';
            $user->save();
            session()->flash('status', "enabled the account successfully");

            return redirect()->back();
        }
    }
}
