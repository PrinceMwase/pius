@extends('layouts.admin.app')

                @section('content')
                
                    <div class="row">
               
                        {{-- add a transfer sheet --}}
                        <div class="col-md-6">
                            <div class="card">
                              <div class="card-header card-header-primary">
                                <h4 class="card-title">Transfer</h4>
                              </div>
                              <div class="card-body">
                                <form method="POST" action="{{route('transfer.update', $id)}}" enctype="multipart/form-data"> 
                                  @csrf
                                  @method('put')
                                  {{-- name --}}
                                  
                                  <div class="row">
                                  
                                    <div class="col-md-12">
                                      <div class="form-group ">
                                        <label class="bmd-label-floating" for="document">Upload an Approval documet</label>
                                        <input type="file" name="document" id="document" class="form-control">
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
            
              </div>
  
 
          </form>
        </div>
      </div>
    </div>
    
  </div>
@endsection
