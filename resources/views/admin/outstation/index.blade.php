@extends('layouts.admin.app')

@section('content')

    <div class="row">
        {{-- videos --}}
       
        <div class="col-lg-6 col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Outstations</h4>
                
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
                      @foreach ($outstations as $outstation)
                          
                                <td>{{$outstation->id}}</td>
                        
                           
                              
                              <td>{{$outstation->name}}</td>
                              <td> 
                                <a href="{{route('outstation.edit', $outstation->id)}}">Edit</a>
                                </td>
                              <td> 
                                <a href="{{route('outstationLeader.edit',  $outstation->id)}}"> Remove Leader
                                </a> 
                               </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
                {{ $outstations->links() }}
              </div>
            </div>
        </div>
     
  

        {{-- add a outstation --}}
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Add a outstation</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('outstation.store')}}" enctype="multipart/form-data"> 
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
@endsection