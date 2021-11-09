<div class="row">
            
    <div class="col-md-4">
      <div class="card card-profile">
       
        <div class="card-body">
          <h6 class="card-category"> {{auth()->user()->first_name}}  {{auth()->user()->last_name}}</h6>
          <h4 class="card-title">Officiated By : {{auth()->user()->baptism->officiator}}</h4>
          <p class="card-description">
            Baptised on: {{  auth()->user()->baptism->date  }}
           
          </p>
          <p class="card-description">
            Baptism number: {{  auth()->user()->baptism->number  }}
           
          </p>
         
        </div>
      </div>
    </div>
  </div>