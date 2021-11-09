<div class="row">
    <div class="col-md-8">
      <div class="card">
    
        <div class="card-body">
          <form method="POST" action="{{route('confirmation.store')}}">
            @csrf
            <div class="row">
             
              <div class="col-md-3">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">officiator</label>
                  <input type="text" name="officiator" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group bmd-form-group">
                  
                  <input type="Date" name="date" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Confirmation Number</label>
                      <input type="number" name="number" class="form-control">
                    </div>
                  </div>
            </div>
     

            <button type="submit" class="btn btn-primary pull-right">Add Details</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
    
  </div>