@extends('layouts.master')
@section('content')

            
<div class="container">
	<div class="row">
		<div class="col-md-8">
			

			<form action="{{url('patient/'.$patient->id)}}" enctype="multipart/form-data" method="post">
             
                <input type="hidden" name="_method" value="PUT">
				{{csrf_field()}}
				<div class="form-group ">
					<label for="">prenom</label>
					<input type="text" name="prenom" class="form-control" value="{{$patient->prenom}}">
					@if($errors->get('prenom'))
					 <ul>
					 	@foreach($errors->get('prenom') as $message)
					 	<li>{{$message}}</li>
					 	@endforeach
					 </ul>
					 @endif
				</div>
				<div class="form-group">
					<label for="">nom</label>
					<input type="text" name="nom" class="form-control" value="{{$patient->nom}}">
						@if($errors->get('nom'))
					 <ul>
					 	@foreach($errors->get('nom') as $message)
					 	<li>{{$message}}</li>
					 	@endforeach
					 </ul>
					 @endif
					
				</div>
					<div class="form-group" style="width:150px;height:20px;">
				<label for="dat">Date de naissance</label>
					<input type="date" name="date" id="dat" value="{{$patient->date_naissance}}" >
					
				</div>
				
                <div class="form-group"style="margin-top:40px;">
                <label>remark</label>
					<textarea class="form-control" width=120px height=120px name="remark"value="{{$patient->remark}}"></textarea>
					@if($errors->get('remark'))
					 <ul>
					 	@foreach($errors->get('remark') as $message)
					 	<li>{{$message}}</li>
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