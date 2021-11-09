@extends('layouts.admin.app')

@section('content')
@if (Gate::allows('manageAcount'))
    <div class="row">
        {{-- videos --}}
       
        <div class="col-lg-6 col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Groups</h4>
                
              </div>
              <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead class="text-warning">
                    <tr>
                     
                        <th>ID</th>
                      
                      
                    <th>Name</th>
                    <th></th>
                    <th></th>
                  </tr></thead>
                  <tbody>
                      @foreach ($groups as $group)
                          
                                <td>{{$group->id}}</td>
                        
                           
                              
                              <td>{{$group->name}}</td>
                              <td> <a href="{{route('group.edit', $group->id)}}">Edit</a> </td>
                              <td> 
                                <form action="{{route('group.destroy', $group->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-warning">Delete</button>
                                </form>
                                </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
                {{ $groups->links() }}
              </div>
            </div>
        </div>
     
  

        {{-- add a group --}}
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Add a Group</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('group.store')}}" enctype="multipart/form-data"> 
                  @csrf
                  {{-- name --}}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating" for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                      </div>
                    </div>
                  </div>
                 
                 
                  <div class="row">
                      <div class="col-md-6">
                          <button type="submit" class="btn btn-primary pull-right">Submit</button>   
                      </div>
                  </div>
               
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
        </div>
    </div>
@endif

@if (!Gate::allows('manageAcount'))
    <div class="row">
        {{-- videos --}}
       
    
  

        {{-- add a group --}}
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Join a Group</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('userGroupsStore')}}" > 
                  @csrf
                  {{-- name --}}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group bmd-form-group">
                        
                        <select name="group" id="groups" style="width: 100%" class="primary form-control">
                          @foreach ($allgroups as $group)
                              <option style="color: black" value="{{$group->id}}">{{$group->name}}</option>
                          @endforeach
                        </select>
   
                      </div>
                    </div>
                  </div>
                 
                 
                  <div class="row">
                      <div class="col-md-6">
                          <button type="submit" class="btn btn-primary pull-right">Submit</button>   
                      </div>
                  </div>
               
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
        </div>
    </div>
@endif


@endsection