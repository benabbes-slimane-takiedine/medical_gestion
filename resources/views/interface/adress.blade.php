@extends('layouts.master')
@section('content')

            
<div class="container">
	<div class="row">
		<div class="col-md-8">
			
          <?php 
		  
            $aumbs=DB::select('SELECT * FROM users WHERE job="Ambulancier"');

		    ?>

			<form action="{{url('Aum/'.$patient->id)}}" enctype="multipart/form-data" method="post">
                 {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT">

				
				
                     
          <div class="form-group">
                   <label for="isd">Ambulancier Disponible </label>

                  <select class="form-control" name="isd">
				  <option></option>
                    @foreach($aumbs as $aumb)
					@if ($aumb->dispoau==1)	
                      <option name="isd" value="{{$aumb->id}}"> {{$aumb->name}} </option>
					  @endif
                    @endforeach
                  </select>
                </div >
                          
				
				<div class="form-group">
					
					<input type="submit" class="form-control btn btn-success " value="affecter" style="margin-top:70px;">
					
				</div>
			</form>
         
			
		</div>
		

	</div>
	

</div>
@endsection
    







