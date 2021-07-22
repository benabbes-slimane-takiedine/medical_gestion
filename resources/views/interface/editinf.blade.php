@extends('layouts.master')
@section('content')
<head>    <meta http-equiv="refresh" content="10">
</head>
             <script src="{{asset('js/ss.js')}}"></script>

            
<div class="container">
	<div class="row">
		<div class="col-md-8">
			
          <?php 
		  
            $doctors=DB::select('SELECT * FROM users WHERE job="Médecin"');

		    ?>

			<form action="{{url('patient/'.$patient->id)}}" enctype="multipart/form-data" method="post">
             
                <input type="hidden" name="_method" value="PUT">
				{{csrf_field()}}
				
                     <div class="form-group"style="margin-bottom:75px;">
  					<label for="sel1">l'états</label>
  					<select class="form-control" id="sel1" name="degree">
					  <option></option>
   						 <option value="1" >immediat</option>
   						 <option value="2">grave</option>
    				<option value="3">stable</option>
    			       <option value="4"> bonne</option>
 						 </select>
                   </div>
				      @if($errors->get('degree'))
					 <ul>
					 	@foreach($errors->get('degree') as $message)
                      {{ $message }}
                      
					 	@endforeach
					 </ul>
					 @endif
			
			 
		
         <label for="isd">medcien traitant </label>
          <div class="form-group">
                  <select class="form-control" name="isd">
				  <option></option>
                    @foreach($doctors as $doctor)
					@if ($doctor->nbr_pat < 3 && $doctor->dispo==1)	
                      <option name="isd" value="{{$doctor->id}}"> {{$doctor->name}} nombre de patient {{$doctor->nbr_pat}}</option>
					  @endif
                    @endforeach
                  </select>
                </div >
                          
				
				<div class="form-group">
					
					<input type="submit" class="form-control btn btn-success " value="enregistrer">
					
				</div>
			</form>
         
			
		</div>
		

	</div>
	

</div>
@endsection
    