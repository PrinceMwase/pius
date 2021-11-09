@extends('layouts.admin.app')

@section('content')

  
  @includeWhen(Route::currentRouteName() == 'lesson.edit', 'admin.lesson.edit', ['lesson' => $lesson])
    <div class="row">
        {{-- lessons categories --}}
        @include('admin.contents', ['categories' => $lessons , 'title' => 'Lessons'])

        {{-- add a Categories --}}
        <div class="col-md-6" >
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Add a Lesson</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('lesson.store')}}" > 
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
                      <label class="bmd-label-floating" for="category">Category</label>
                      <select name="category" id="category" class="form-control">
                        @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating" for="level">Level</label>
                      <select name="level" id="level" class="form-control">
                        @foreach ($levels as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
      </div>
        
    </div>
    
     
  
@endsection