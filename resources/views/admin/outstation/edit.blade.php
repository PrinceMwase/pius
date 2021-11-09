@extends('layouts.admin.app')

@section('content')

    <div class="row">
        {{-- videos --}}
       
    

        {{-- add a outstation --}}
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Edit</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('outstation.update', $outstation->id)}}" enctype="multipart/form-data"> 
                  @csrf
                  @method('PUT')
                  {{-- name --}}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating" for="name">Name</label>
                        <input type="text" name="name" value="{{$outstation->name}}" class="form-control">
                      </div>
                    </div>
                  </div>
                 
                 
                  <div class="row">
                      <div class="col-md-6">
                          <button type="submit" class="btn btn-primary pull-right">update</button>   
                      </div>
                  </div>
               
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection