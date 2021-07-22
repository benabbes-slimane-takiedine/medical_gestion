@extends('layouts.master')
@section('content')

            
<div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h2>Orientation form</h2>
    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">{{$patient->nom}} {{$patient->prenom}} tests </span>
          <span class="badge badge-secondary badge-pill"> XX </span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0"> blood group </h6>
              <small class="text-muted"> AB+</small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0"> Alergy test </h6>
              <small class="text-muted"> negative</small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Counscious</h6>
              <small class="text-muted">yes</small>
            </div>
          </li>

        </ul>

      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Orientation letter</h4>
            
         <!-- <div class="row">
            <div class="col-md-6 mb-3">
             
            </div>
            <div class="col-md-6 mb-3">
             --> 
            

          <div class="mb-3">
           <form class="form-control" action="{{url('medecin/'.$patient->id)}}" enctype="multipart/form-data" method="post">
        
                <input type="hidden" name="_method" value="put">
				{{csrf_field()}}
            <input length="150" type="textarea" class="form-control" id="orientation" name ="orientation" placeholder="ori" v required>
            


            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            
        </form>
        
          </div>
      </div>
    </div>

  </div>
  

@endsection