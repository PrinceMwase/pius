<div class="row">
    <div class="col-md-12">
          <table class="table table-hover">
        <thead class="text-warning">
          <tr>
           
            
          <th>Name</th>
          <th></th>
          <th></th>
        </tr></thead>
        <tbody>
            @foreach ($user_groups as $user_group)
                
                      <td>{{$user_group->group->name}}</td>
              
                 
                    
                    <td> 
                      <a href="{{route('userGroupsRemove', $user_group->group->id)}}">Unjoin</a>
                      </td>
   
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>

  
