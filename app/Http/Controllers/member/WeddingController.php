<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Wedding;
use Illuminate\Support\Facades\Gate;

class WeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('admin.accounts.show');
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

        if (!Gate::allows('memberActive')) {
            abort(403, 'Your Account is inactive');
        }

        //validation
        $request->validate([
            "officiator" => "Required|string",
            "date" => "Required|Date",
            "number" => "Required|integer"
        ]);

        if (auth()->user()->hasWedding() ) {
            session()->flash('error', 'cannot update details: contact adminstrator');

            return redirect()->back();
        }
        

        auth()->user()->wedding()->create( 

           [
                'officiator' => $request->officiator,
                'date' => $request->date,
                "number" => $request->number
            ]

            );

         session()->flash('status', 'added wedding details succeffully');

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

        if (auth()->user()->hasWedding() ) {
          
            
            return redirect()->route('wedding.index');
        }
      
        $user = User::find($id);

        

        $this->authorize('view', $user);
        //
        return view ('admin.accounts.show');
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
