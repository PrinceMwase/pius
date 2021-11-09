@extends('layouts.admin.app') 
@section('content')
<div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Update Profile</h4>
          <p class="card-category">Complete your profile</p>
        </div>
        <div class="card-body">
          <form method="POST" action="{{route('user.update', auth()->user()->id)}}">
            @csrf
            @method('put')
            <div class="row">
             
              
              <div class="col-md-8">
                  <select name="outstation" id="outstation" class="form-control">
                    @foreach ($outstations as $outstation)
                        <option style="color: black" value="{{$outstation->id}}">{{$outstation->name}}</option> 
                    @endforeach
                  </select>
              
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Fist Name</label>
                  <input type="text" name="first_name" class="form-control" value="{{auth()->user()->first_name}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Last Name</label>
                  <input type="text" name="last_name" class="form-control" value="{{auth()->user()->last_name}}">
                </div>
              </div>
            </div>
            {{-- password --}}
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Password</label>
                    <input type="password" name="password" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Confirm password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                  </div>
                </div>
              </div>
           
            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
 
          </form>
        </div>
      </div>
    </div>
    
  </div>
@endsection
