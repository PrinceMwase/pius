@extends('layouts.admin.app')

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header ">
                <h4 class="card-title mt-0"> Financial Report </h4>
                
                @if ($request)
                    <p class="card-category">From : {{$request->from}} | To : {{$request->to}} </p>
                @else
                 
                 <p class="card-category">For the whole year</p>
                @endif
                <form method="POST" action="{{route('report')}}">
                    @csrf
                    <div class="row">
                      
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating" for="from">From</label>
                          <input type="date" name="from" id="from" value="{{old('from')}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating" for="to" >To</label>
                          <input type="date" class="form-control" name="to" value="{{old('to')}}" id="to">
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    
                    <button type="submit" class="btn btn-primary pull-right">Retrieve</button>
                    <div class="clearfix"></div>
                  </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Outstation
                                </th>
                                <th>
                                    Tithe
                                </th>
                                <th>
                                    Paper Sunday
                                </th>
                                <th>
                                    Sunday Offering
                                </th>
                                <th>
                                    Other
                                </th>
                                <th>
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($outstations as $outstation)
                                <tr>
                                
                                        <td> {{$outstation->id}} </td>
                                        <td> {{$outstation->name}} </td>
                                        @foreach ($paymentTypes as $type)
                                            <td class="td"> {{$outstation->paymentsAdd($type->name , $outstation->id, $request)}} </td>
                                        @endforeach
                                        <td class="totalForOutstation td text-primary">

                                        </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>#</td>
                                <td>Totals</td>
                                @foreach ($paymentTypes as $type)
                                    <td class="totalForType">0</td>
                                @endforeach
                                <td class="totalForType text-primary">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            // sum up the totals for the outstations money
            let siblings = $('.totalForOutstation').each(function (v,w) {

                let sum = 0;
                $(w).siblings().each( function(x,y){

                    if(x > 1)

                    {let value = $(y).text()

                    value = parseInt( value )

                    sum += value;}

                } );

                $(w).text(sum);
                console.log('done');

            } ) ;

            // sum up the totals for payment Type
            console.log('start');
            let collumns = $('.totalForType');

            collumns.each( ( v , w )=>{
                let sum = 0;
                let cellIndex =  w.cellIndex
                console.log(cellIndex);

                $( '.td' ).each( ( x , y )=>{
                    
                    let element = y;
                    console.log();

                    if( element.cellIndex === cellIndex ){
                        let value = $(element).text();
                        value = parseInt( value );

                        sum += value
                    }


                } )
                
                $(w).text(sum);


            })

        })
    </script>
@endsection