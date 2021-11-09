<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RequestTransfer;
use App\Notifications\ApproveTransfer;
use App\Transfer;
use App\User;

class TransferController extends Controller
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
        $transfers = Transfer::where('status', 'pending')->paginate(10);
        return view('member.transfer.index')
            ->with('transfers', $transfers)
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
        //validate
        $this->authorize('create', Transfer::class);
        
        if (auth()->user()->status === 'inactive' || auth()->user()->role->name != 'member'){
            abort(403, "Not Authorized, Contact Adminstrator");
        }
        if( 
            auth()->user()->hasTransfer()
        ){
            session()->flash('status', "Cannot Request another Transfer");

            return redirect()->back();
        }


        $request->validate([
            'location' => "Required|string",
            'reason'  => ' Required|string'
        ]);

        auth()->user()->transfer()->save(
            new Transfer(['location' => $request->location, 'status' => 'pending' , 'reason' => $request->reason ])
        );

        $admin = User::find(1);

        Notification::send($admin , new ApproveTransfer ( auth()->user()->first_name  ) );

        session()->flash('status', "successfully Requested for a transfer");

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

        

        return view('member.transfer.show')
            
            ->with('id', $id);
        

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

        $request->validate([
            'document' => 'required|file'
        ]);

        $transfer = Transfer::find( $id );

        $path = $request->file('document')->store( 'public' );

        $transfer->status = 'approved';
    
        $transfer->document = $path;

        $transfer->save();
        Notification::send($transfer->user , new RequestTransfer( $transfer->location ) );

        $transfer->user->status = 'inactive';

        $transfer->user->save();

        $user = User::find(1);

        $user->notifications()->delete();


        session()->flash('status', "uploaded successfully");

        return redirect()->route('transfer.index');

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
    public function transferApproval(){

        $link = './storage'.explode('public',auth()->user()->transfer->document)[1]  ;
        
        return response()->file($link);
        return $link;

    }
}
