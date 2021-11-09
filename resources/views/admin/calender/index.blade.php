@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Calenders</h4>
                
              </div>
              <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead class="text-warning">
                    <tr>
                      <th>Year</th>
                      <th></th>
                      <th></th>
                    </tr></thead>
                  <tbody>
                      @foreach ($calenders as $calender)
                          <tr class="calender alert alert-info">                              
                              <td style="color: whitesmoke">{{$calender->year}}</td>
                              <td >
                                <a  href="{{route('deleteCalender', $calender->id)}}"> Delete</a>
                              </td>
                              <td>
                                  <a href="{{'../storage/'.explode('public',$calender->link)[1] }}">download</a>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
                {{ $calenders->links() }}
              </div>
            </div>
        </div>

    {{-- upload --}}
    <div class="col-md-6">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add a Calender</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('calender.store')}}" enctype="multipart/form-data"> 
              @csrf
              {{-- name --}}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating" for="year">Year</label>
                    <input type="date" name="year" class="form-control">
                  </div>
                </div>
              </div>
              {{-- level and category --}}
              
              <div class="row">
              
                <div class="col-md-12">
                  <div class="form-group ">
                    <label class="bmd-label-floating" for="calender"><a id="forCalender" class="btn btn-warning">Select a Calender</a> </label>
                    <input type="file" name="calender" id="calender" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <button type="submit" class="btn btn-primary pull-right">Upload</button>   
                  </div>
              </div>
            </form>
          </div>
        </div>
    </div>
    </div>


@endsection
@section('script')
    <script>

$(document).ready(function (){
  $('#calender').on('change', function(){
    let value = $(this).val();

    $('#forCalender').text( value.split('fakepath')[1].substr(0, 40) + '...' );

  })
})

</script>
@endsection
