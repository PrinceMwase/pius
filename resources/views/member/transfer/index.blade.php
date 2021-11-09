@extends('layouts.admin.app')

@section('content')
<div class="row">
  @if (!Gate::allows('manageAcount'))
    <div class="col-md-6">
      <div class="card card-profile">
        
        <div class="card-body">
            
        
          
          <form method="POST" action="{{route('transfer.store')}}" enctype="multipart/form-data"> 
            @csrf
            {{-- name --}}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating" for="location">Location</label>
                  <input type="text" name="location" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating" for="reason">Reason for Transfer</label>
                  <input type="text" name="reason" class="form-control">
                </div>
              </div>
            </div>
           
         
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary ">Request A Transfer</button>   
                </div>
            </div>
         
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>a
    @endif

    @if (auth()->user()->hasTransferApproved())
        <div class="col-md-6">
          <a href="{{route('transferApproval')}}" class="btn btn-primary ">Download Approval document</a>   
        </div>
    @endif

    {{-- list of transfers --}}
    @if (Gate::allows('manageAcount'))
    <div class="col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Pending Transfers</h4>
          
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-warning">
              <tr>
                
                
              <th>Name</th>
              <th>Location</th>
              <th>Reason for Transfer</th>
              <th>Action</th>
            </tr></thead>
            <tbody>
                @foreach ($transfers as $transfer)
                    <tr class="transfer">
                  
                    
                        
                        <td>{{$transfer->user->first_name}} {{$transfer->user->last_name}}</td>
                        <td>{{$transfer->location}}</td>
                        <td>{{$transfer->reason}}</td>
                        
                        <td>    <a href="{{route('transfer.show', $transfer->id)}}"> approve </a>  </td>
                        <td>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          {{ $transfers->links() }}
        </div>
      </div>
  </div>
  @endif


  </div>
@endsection