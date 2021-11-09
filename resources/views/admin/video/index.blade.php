@extends('layouts.admin.app')

@section('content')

    <div class="row">
        {{-- videos categories --}}
       
        @include('admin.contents', ['categories' => $videos , 'title' => 'Videos'])
        {{-- add a video --}}
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Add a Video</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('video.store')}}" enctype="multipart/form-data"> 
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
                  {{-- level and category --}}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating" for="lesson">Lesson</label>
                        <select name="lesson" id="lesson" class="form-control">
                          @foreach ($lessons as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                 
                  </div>
                  <div class="row">
                  
                    <div class="col-md-12">
                      <div class="form-group ">
                        <label class="bmd-label-floating" for="video">Upload a video</label>
                        <input type="file" name="video" id="video" class="form-control">
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