@extends('layouts.admin.app')

@section('css')
    <style>
        .dark-edition .form-control {
            color: #7b1fa2;
        }
    </style>
@endsection

@section('content')
<div class="row">

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Change Role from {{$user->role->name}} for : </p>
                    </div>
                <div class="card-body">
                    <form method="POST" action="{{route('accounts.update', $user->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">{{$user->first_name}}  {{$user->last_name}}</label>
                                <input type="text" class="form-control" disabled="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Role</label>
                            <select name="role" id="role" class="primary form-control">
                            @foreach ($roles as $role)
                                <option class="btn-primary form-control" value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div> 
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Assign supervision</h4>
                    
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{route('supervisor.update', $user->id)}}">
                        @csrf
                        @method('PUT')
                      <div class="row">
                        
                        <div class="col-md-6">
                          <div class="form-group bmd-form-group">
                            
                            <select name="group" id="group" class="primary form-control">
                              @foreach ($groups as $group)
                                  <option class="btn-primary form-control" value="{{$group->id}}">{{$group->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group bmd-form-group">
                              <button type="submit" class="btn btn-primary pull-right">Assign</button>
                          </div>
                        </div>
                        
                        </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
    </div>
   
    </div>
    <div class="col-md-4">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Groups</h4>
            <p class="card-category"> Being superviserd by {{$user->first_name}}  {{$user->last_name}}</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                  <th>
                    Name
                  </th>
                  <th>
                    Action
                  </th>
                </tr></thead>
                <tbody>
                  
                  @foreach ($user->groups as $group)
                  <tr>
                    <td>
                      {{$group->name}}
                    </td>
                    <td>
                        <form action="{{route('supervisor.destroy', $user->id)}}" method="post">
                            @method('delete')
                            <input type="hidden" name="group" value="{{$group->id}}">
                            @csrf
                        <button class="btn btn-primary" type="submit">remove</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                  
                  
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

</div>







  {{-- assign group supervisor --}}



  {{-- asignn outstation leader --}}

  @if( !$user->outstation->leader )
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Assign Leader for {{$user->outstation->name}}</h4>
          
        </div>
        <div class="card-body">
          <form method="POST" action="{{route('outstationLeader.store')}}">
              @csrf
            <div class="row">
              <input type="hidden" name="leader" value="{{$user->id}}">
              <input type="hidden" name="outstation" value="{{$user->outstation->id}}">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  
                 
                </div>
                <div class="form-group bmd-form-group">
                    <button type="submit" class="btn btn-primary pull-right">Assign</button>
                </div>
              </div>
              
              </div>
         
         
         
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif




@endsection