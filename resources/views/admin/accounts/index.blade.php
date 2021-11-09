@extends('layouts.admin.app') @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Church Members</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                             
                                <th>Name</th>
                                <th>Outstation</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                             <tr>
                                
                                <td>{{$user->first_name}}  {{$user->last_name}}</td>
                                <td> {{$user->outstation->name}} </td>
                                <td>
                                    <a href="{{route('accounts.edit', $user->id)}}"> {{$user->role->name}} </a>
                                </td>
                                <td >
                                    <a  href="{{route('disableAccount', $user->id)}}"  @if ($user->status == 'active') class="text-primary" @endif >{{$user->status}}</a> 
                                    
                                </td>
                            </tr>
                            @endforeach

                        
                        </tbody>
                    </table>
                    @if( Route::currentRouteName() != 'adminSearch.store' )
                    {{$users->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if( Route::currentRouteName() == 'adminSearch.store' )
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Groups</h4>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                               
                                <th>Name</th>
                                <th>supervisor</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                             <tr>
                                <td> {{$group->name}} </td>

                                <td>{{$group->first_name}}  {{$group->last_name}}</td>
                                
                               
                                
                            </tr>
                            @endforeach

                        
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
