@extends('layouts.master')
@section('content')

<h1 style="text-align:center;">List des message</h1>
<div class="container">
<div class="row">
<div class="col-md-4">

			 @if(count($messages)>0)

@foreach ($messages as $message)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Un Message: {{$message->sujet}}</h5>
  <small class="card-text">{{$message->created_at}}</small>
    <a href="{{url('Aum/'.$message->id)}}" class="card-link" style="margin-top:12px;">Affiche message</a>
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