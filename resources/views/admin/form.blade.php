<div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Add a {{$title}}</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{$action}}" > 
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="name">Name</label>
                <input type="text" name="name" class="form-control">
              </div>
            </div>
          </div>
          
          
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
</div>