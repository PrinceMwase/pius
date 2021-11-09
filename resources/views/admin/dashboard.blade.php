@extends('layouts.admin.app')

@section('content')
<div class="row">
  
    {{-- Members --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Members</p>
            <h3 class="card-title">{{$members}}</h3>
          </div>
          
        </div>
      </div>

    {{-- outstations --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">info_outline</i>
          </div>
          <p class="card-category">Outstations</p>
          <h3 class="card-title">{{$outstations}}</h3>
        </div>
        
      </div>
    </div>

    {{-- Groups --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Groups</p>
            <h3 class="card-title">{{$groups}}</h3>
          </div>
          
        </div>
      </div>

  </div>

@endsection


@section('script')

@endsection

