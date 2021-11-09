<div class="col-lg-6 col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">{{$title}}</h4>
        
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead class="text-warning">
            <tr>
              @if ( Route::currentRouteName() == 'video.index')
                <th>video</th>
              @else
                <th>ID</th>
              @endif
              
            <th>Name</th>
            <th></th>
            <th></th>
          </tr></thead>
          <tbody>
              @foreach ($categories as $category)
                  <tr class="category">
                    @if ( Route::currentRouteName() == 'video.index')
                        <td>
                           <div class="card-avatar">
                              
                                <video controls width="240px" src="{{'../storage/'.explode('public',$category->location)[1] }}"></video>
                                
                              
                            </div>
                        </td>
                    @else
                        <td>{{$category->id}}</td>
                    @endif
                   
                      
                      <td>{{$category->name}}</td>
                      <td>Edit</td>
                      <td>Delete</td>
                  </tr>
              @endforeach
          </tbody>
        </table>
        {{ $categories->links() }}
      </div>
    </div>
</div>
@section('script')
    <script>

      let current_route = "{{ Route::currentRouteName() }}".split('.')[0]

      editCategory(current_route)
      $(document).ready(function(){
          $('.delete').on('click', function (event) {
            event.preventDefault();
            $('#delete').submit()
          })
        })
      
      function editCategory( route ){
        console.log( route );
          $(document).ready(function(){
          $('.category').on('click', function (event) {
            var children = $(this).children();

            var update_route = `/${route}/${children[0].innerText}/edit`

            
            window.location = window.origin+update_route;
            
          })
        })
      }
      
    </script>
@endsection