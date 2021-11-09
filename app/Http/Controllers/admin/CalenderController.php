<?php

namespace App\Http\Controllers\admin;

use App\Calender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $calenders = Calender::paginate(10);

        return view('admin.calender.index')
            ->with('calenders', $calenders)
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
        $this->authorize('create', Calender::class);

        $request->validate([
            'year' => 'required|string|unique:calenders,year',
            'calender' => 'required|mimes:pdf,doc,xlsx,odt',
        ]);

        $year = explode('-',$request->year)[0] ;
        // save video file and copy file name
        $path = $request->file('calender')->store( 'public/');

        $calender = new Calender(['year' => $year, 'link' => $path]);

        $calender->save();

        session()->flash('status', 'uploaded Calender for ' . $year . " successfully");

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
        $this->authorize('delete', Calender::find($id));

        Calender::find($id)->delete();


        return redirect()->back()->with('status', 'deleted The Calendar Successfully');
    }

    public function getCalender(){
        $year = date('y');
        $calender = Calender::where('year', $year)->first();
        
        if (! $calender){
            abort(403, "Did not find any calender for this year");
        }else{
           $link =  './storage'.explode('public',$calender->link)[1];
           return response()->download($link, "calender-".$year.'.pdf' );
        }
    }
}
