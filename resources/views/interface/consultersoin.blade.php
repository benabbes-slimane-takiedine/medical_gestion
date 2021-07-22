@extends('layouts.master')
@section('content')



<h1 style="text-align:center;">List des Soins</h1>
<div class="container">
<div class="row">
<div class="col-md-4">

			 @if(count($soins)>0)

@foreach ($soins as $soin)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Un Soin: {{$soin->noms}}</h5>
  <p class="card-text"> POUR:</p>
    <p class="card-text"> {{$soin->nom}} </p>

    <p class="card-text"> {{$soin->prenom}} </p>

  <button class="btn btn-danger card-link"> Valider</button>
 <a href="{{url('patient/'.$soin->pat_id)}}" class="btn btn-success">details</a>

  </div>
</div>
    


@endforeach
@else
<p>pas de message reçu</p>
@endif
</div>
</div>
</div>

@endsection









