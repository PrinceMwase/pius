@extends('layouts.admin.app')

@section('content')

@includeWhen(Route::currentRouteName() == 'category.edit', 'admin.lessonCategory.edit', ['category' => $category])
    <div class="row">
        {{-- lesson categories --}}
       
        @include('admin.contents', ['categories' => $lessonCategories , 'title' => 'Categories'])
        {{-- add a Categories --}}
      
        @include('admin.form', ['action' => route('category.store') , 'title' => 'Category' ])
        
        
        
    </div>
@endsection