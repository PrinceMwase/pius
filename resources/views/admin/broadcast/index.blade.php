@extends('layouts.admin.app')

@section('content')
        {{--Broadcast  --}}
        @if (Gate::allows('secretary'))
        <div class="row">
           <div class="col-md-12">
             <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add an Event </h4>
                  
                </div>
                <div class="card-body">
                  <form method="POST" action="{{route('broadcast.store')}}">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="title"> <h6>Title</h6> </label>
                            <input class="form-control" name="title" id="title" >
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
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          
                          <input type="Date" name="date" class="form-control">
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
                        Event Type 
                    </button>
                    <div class="class dropdown-menu"  aria-labelledby="dropdownMenuButton">
                        <a href="#" class="dropdown-item eventType">Wedding</a>
                        <a href="#" class="dropdown-item eventType">Baptism</a>
                        <a href="#" class="dropdown-item eventType">Confirmation</a>
                        <a href="#" class="dropdown-item eventType">other</a>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Send</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div> 
            
          </div>
        {{-- Messages --}}
        @endif
    <div class="row">
        <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Messages</h4>

            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h4 class="card-title">Latest</h4>
                  
                  
                    @foreach ($user->notifications as $notification)
                    <div class="alert alert-info alert-with-icon" data-notify="container">
                      @if (Gate::allows('secretary'))
                      <a href="{{route('deleteNotification', $notification->id)}}" class="btn close" data-dismiss="alert" aria-label="Delete">
                        <i class="material-icons">Delete</i>
                      </a>
                      @else
                      <a href="{{route('approveNotification', $notification->id)}}" class="btn close" data-dismiss="alert" aria-label="Approve">
                        <i class="material-icons">Approve</i>
                      </a>
                      @endif
                      {{-- <span data-notify="message">{{$notification->data['message']}}</span> --}}
                      <blockquote class="blockquote">
                        <p>
                          {{$notification->data['title']}}
                        </p>
                        <small>
                          {{$notification->data['message']}}
                        </small>
                      </blockquote>
                      
                    </div>
                    @endforeach

                
                  
                </div>
                
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
        let type = $(this).text();

        let title = $('#dropdownMenuButton').text(type)  

        $('#other').val(type);
        
        if(type == 'other') {
          $('.other').css({'display':'block'});
        }


        
        })

        // delete notification asynchrounasly

        $('.close').on('click', function(){
          console.log(this.href);

          $.get( `${this.href}`).done( function( data ){
            alert('Completed the Transaction Successfuly');
          });

        })

        


      })
      
    </script>
@endsection