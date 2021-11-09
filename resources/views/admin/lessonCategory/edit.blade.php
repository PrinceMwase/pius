<div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Uodate a Category</h4>
      </div>
      <form id="delete" action="{{route('category.destroy', $category->id)}}" method="post">
        @csrf
        @method('DELETE')
    </form>
      <div class="card-body">
        <form method="POST" action="{{route('category.update', $category->id)}}"> 
            @method('PATCH')
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="name">Name</label>
                <input type="text" value="{{$category->name}}" name="name" class="form-control">
              </div>
            </div>
          </div>
          
          <button type="submit"  class=" delete btn btn-danger pull-left">Delete</button>
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
</div>