<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification as AppNotification;
use App\Notifications\Broadcast;
use App\Role;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Notification;

class BroadcastController extends Controller
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
        //

        $this->authorize('create', AppNotification::class);
       

        $user = Role::where('name', 'secretary')->first()->users()->first();

        // dd($user->notifications));

        return view('admin.broadcast.index')
            ->with('user', $user)
        ;
    }

    // getting notifications for the admin
    public function getNotification(){
        return Role::where('name', 'secretary')->first()->users()->first()->notifications;
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
     * Create a broadcast to all student or a student replying to an admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        
        $this->authorize('create', AppNotification::class);
        
        $users = User::find(4);
        $request->validate([
            'message' => 'required|string',
            'title' => 'required|string',

        ]);
    

        Notification::send($users, new Broadcast( $request->title,  $request->message, $request->other, $request->date ) );

        session()->flash('status', "Sent The Notification successfully");

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
        $user = User::find($id);
        //validation
             $request->validate([
                 'message' => 'required'
             ]);
        //  Notification::send($user, new Broadcast(  $request->message ) );
     
             session()->flash('status', "Replied to the message successfully");
     
             return redirect()->back();

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
        $this->authorize('delete', AppNotification::find($id));

        AppNotification::find($id)->delete();


        return redirect()->back()->with('status', 'deleted The Message Successfully');
    }
    public function approve($id)
    {
        //
        $this->authorize('delete', AppNotification::find($id));

        $notification = AppNotification::find($id);

        $notification->approved = 'yes';

        $notification->save();

        return redirect()->back()->with('status', 'deleted The Message Successfully');
    }
}
