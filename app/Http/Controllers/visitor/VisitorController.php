<?php

namespace App\Http\Controllers\visitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class VisitorController extends Controller
{
    //
    public function index(){
        return view('visitor.index');
    }
    public function events(){
        $user = User::find(3);
        return view('visitor.events')
            ->with('title', 'Events And Announcements')
            ->with('user', $user)
        ;
    }
    public function allEvents(){
        $user = User::find(4);

        return response()->json( $user->notifications );
    }

    public function searchevents(Request $request){




        $user = User::find(3);
        return view('visitor.events')
            ->with('title', 'Events And Announcements')
            ->with('user', $user)
            ->with('search', $request->search)
        ;
    }
}
