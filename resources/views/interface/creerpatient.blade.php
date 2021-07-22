@extends('layouts.master')
@section('content')

            
<div class="container">
	<div class="row">
		<div class="col-md-8">
			

			<form action="{{url('patient')}}" enctype="multipart/form-data" method="post">
				{{csrf_field()}}
				<div class="form-group ">
					<label for="">prenom</label>
					<input type="text" name="prenom" class="form-control" value="{{old('prenom')}}">
					@if($errors->get('prenom'))
					 <ul>
					 	@foreach($errors->get('prenom') as $message)
                       {{ $message }}
                      
					 	@endforeach
					 </ul>
					 @endif
				</div>
				<div class="form-group">
					<label for="">nom</label>
					<input type="text" name="nom" class="form-control" value="{{old('nom')}}">
						@if($errors->get('nom'))
					 <ul>
					 	@foreach($errors->get('nom') as $message)
                      {{ $message }}>
                      
					 	@endforeach
					 </ul>
					 @endif
					
				</div>
				<div class="form-group" style="width:150px;height:20px;margin-bottom:40px;">
				<label for="dat">Date de naissance</label>
					<input type="date" name="date" id="dat" >
					</div>
						<div class="form-group">
					<label for="">adress Incident</label>
					<input type="text" name="adress" class="form-control" value="{{old('adress')}}">
					
				</div>
				<div class="form-check" style="margin-top:50px;">
 	       <input class="form-check-input" type="radio" name="Sexe" id="exampleRadios1" value="1" >
  			<label class="form-check-label" for="exampleRadios1">
    							Male
 							 </label>
					</div>
		<div class="form-check">
  	<input class="form-check-input" type="radio" name="Sexe" id="exampleRadios2" value="2">
  <label class="form-check-label" for="exampleRadios2">
    Female
  </label>
	</div>
				<br>
                <div class="form-group"style="margin-top:30px;">
                <label for="rem">remark</label>
					<textarea class="form-control" name="remark" id=rem></textarea>
						@if($errors->get('remark'))
					 <ul>
					 	@foreach($errors->get('remark') as $message)
                      {{ $message }}
                      
					 	@endforeach
					 </ul>
					 @endif
					
				</div>
                 
				
				
				<div class="form-group">
					
					<input type="submit" class="form-control btn btn-success " value="enregistrer">
					
				</div>
			</form>

			
		</div>
		

	</div>
	

</div>


@endsection