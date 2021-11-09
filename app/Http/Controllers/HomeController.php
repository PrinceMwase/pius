<?php

namespace App\Http\Controllers;

use App\Group;
use App\Outstation;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $outstations = Outstation::all()->count();
        $members = User::all()->count();
        $groups = Group::all()->count();
        return view('admin.dashboard')
            ->with('outstations', $outstations)
            ->with('members', $members)
            ->with('groups', $groups)
        ;
    }
}
