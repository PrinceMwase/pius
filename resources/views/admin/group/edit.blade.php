@extends('layouts.admin.app')

@section('content')
    <div class="row">
          {{-- edit a group --}}
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Add a Group</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('group.update', $group->id)}}" enctype="multipart/form-data"> 
                  @csrf
                  @method('put')
                  {{-- name --}}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating" for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$group->name}}">
                      </div>
                    </div>
                  </div>
                 
                 
                  <div class="row">
                      <div class="col-md-6">
                          <button type="submit" class="btn btn-primary pull-right">Update</button>   
                      </div>
                  </div>
               
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection