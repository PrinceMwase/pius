@extends('layouts.admin.app')

@section('content')

    <div class="row">
        {{-- lesson categories --}}
       


        @include('admin.contents', ['categories' => $lessonLevels , 'title' => 'Level' ])
        {{-- add a Categories --}}
      
        @include('admin.form', ['action' => route('level.store') , 'title' => 'Level' ])
        
        
        
    </div>
@endsection 