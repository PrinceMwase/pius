 @extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Payment</h4>
            
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead class="text-warning">
                <tr>
                  
                
                <th>type</th>
                <th>amount</th>
                <th>date</th>
                <th>description</th>
              </tr></thead>
              <tbody>
                  @foreach ($payments as $payment)
                      <tr class="transfer">
                    
                       
              
                          <td>{{ auth()->user()->paymentType( $payment->payment_type_id )->name }} </td>
                          <td>{{$payment->amount}}</td>
                          <td>{{$payment->created_at}}</td>
                          <td>{{$payment->description}}</td>
                          <td>
                              
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          
          </div>
        </div>
    </div>
    {{-- create --}}
    <div class="col-md-6">
        
          
          <div class="card-body">
              
          
 
             
           
              <div class="row">
                  <div class="col-md-12">
                      <a href="{{route('payment.create')}}" class="btn "> Pay </a>   
                  </div>
              </div>
           
            
          </div>
       
      </div>
</div>
@endsection