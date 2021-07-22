@extends('layouts.master')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-8">

<div class="card">
  <div class="card-header">
    Par {{$message->nom}}
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>{{$message->message}}</p>
      <footer class="blockquote-footer">{{$message->created_at}}</footer>
    </blockquote>
  </div>
</div>
</div>
</div>
</div>
@endsection