@extends('layouts.visitor.app')

@section('content')
<section class="wrapper style5">
    <div class="inner">

        

        

        <section>
            <h4>Events</h4>
            @if ( Route::currentRouteName() !='searchEvents')
            <h5>Filter : <select  id="category">
                <option value="all">- all -</option>
                <option value="Wedding">Wedding</option>
                <option value="Baptism">Baptism</option>
                <option value="Confirmation">Confirmation</option>
                <option value="announcement">Announcements</option>
            </select> </h5>
            @endif
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>due</th>
                        </tr>
                    </thead>
                    <tbody class="notifications">
                        {{-- @foreach ($user->notifications as $notification)
                            <tr>
                            <td>{{$notification->data}}</td>
                            <td>{{$notification->data}}</td>
                            <td>{{$notification->data}}</td>
                        </tr>  
                        @endforeach --}}
                      
                      
                    </tbody>
               
                </table>
            </div>

           
        </section>

        

        

        

    </div>
</section>
@endsection

@section('script')
    <script>

        $(document).ready(function(){

            @if ( Route::currentRouteName() !='searchEvents')

            $.get('eventsNotifications', function(data){
                // console.log(data[0].data );
                data.forEach(data => {
                    
                    $('.notifications').append(`
                    <tr>
                            <td>${data.data['title']}</td>
                            <td>${data.data['message']}</td>
                            <td>${data.data['date']}</td>
                        </tr>  
                    `)
                });
            })

            $('#category').on('click', function(event){
                let value = $(this).val()
                
                // ajax
                $.get('eventsNotifications', function(data){
                // console.log(data[0].data );

                    if( data ){

                        $('.notifications').html('');

                        data.forEach(data => {
                            
                            if(data.data['type'].includes(value) || value === 'all'  )
                            $('.notifications').append(`
                                <tr>
                                        <td>${data.data['title']}</td>
                                        <td>${data.data['message']}</td>
                                        <td>${data.data['date']}</td>
                                    </tr>  
                                `)

                        });
                    }
            })
                
            } )

            @else

            
            $.get('eventsNotifications', function(data){
                // console.log(data[0].data );
                data.forEach(data => {
                    if(data.data['message'].includes("{{$search}}")   )
                    $('.notifications').append(`
                    <tr>
                            <td>${data.data['title']}</td>
                            <td>${data.data['message']}</td>
                            <td>${data.data['date']}</td>
                        </tr>  
                    `)
                });
            })

            @endif
        })
    </script>
@endsection