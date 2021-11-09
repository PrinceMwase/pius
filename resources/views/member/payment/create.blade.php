@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add a Payment </h4>
            
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('payment.store')}}">
              @csrf   
             <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating" for="title"> <h6>Amount</h6> </label>
                      <input class="form-control" name="amount" type="number" id="amount" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating" for="message">Description</label>
                      <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating other" for="other" style="display: none"> <h6>Specify</h6> </label>
                      <input class="form-control other" style="display: none" name="other" id="other" >
                    </div>
                  </div>
                </div>
              </div>
              

                <button class="btn btn-primary dropdown-toggle pull-left EventTitle" name="eventType" type="button" id="dropdownMenuButton" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                  Payment Type 
              </button>
              <div class="class dropdown-menu"  aria-labelledby="dropdownMenuButton">
                  @foreach ($types as $type)
                  <a href="#" class="dropdown-item eventType">{{$type->name}}</a>
                  @endforeach
                
          
              </div>
              <button type="submit" class="btn btn-primary pull-right">submit</button>
            
            </form>
          </div>
        </div>
    </div> 
</div>  
    
@endsection


@section('script')
    <script>
      $(document).ready(function(){
        $('.eventType').on('click', function(evemt){
          evemt.preventDefault();
          console.log('amen');
        let type = $(this).text();
        console.log(type);

        let title = $('#dropdownMenuButton').text(type)  

        $('#other').val(type);
        
        // if(type == 'Other') {
        //   console.log('other');
        //   $('.other').css({'display':'block'});
        // }


        
        })
      })
      
    </script>
@endsection