@extends('layouts.master')
@section('content')
<head>    <meta http-equiv="refresh" content="10">
</head>
 
<div class="container-fluid">
 <div class="row">
 	<div class="col-md-12">

 		<h1>List des Patient</h1>
		
			<table class="table">
 			<thead>
 				<tr>
 					<th>nom</th>
 					<th>prenom</th>
 					<th>date</th>
					 <th>Sexe</th>
           <th>degree</th>
 					<th>remark</th>
                     
					 <th>Arriver</th>
					 <th>Gérer</th>

 				</tr>

 			</thead>
 			<tbody>
			 
			 @if(count($patients)>0)
 				@foreach($patients as $patient)
				  @if(auth()->user()->id == $patient->user_id)
 				<tr>

 					<td>
 						{{$patient->nom}} <br>

 					</td>
 					<td>{{$patient->prenom}}</td>
 					<td>{{$patient->date_naissance}}</td>
					 <td>@if (($patient->Sexe)==1)
						 <?php echo ('Male'); ?>
					 @endif
					 @if (($patient->Sexe)==2)
						 <?php echo ('Femele'); ?>
					 @endif
					 </td>
            <td>
					  
					 @if (($patient->degree)==0)
						 <?php echo ('"Veuillez évaluer ce patient"'); ?>
					@endif	 

					 @if (($patient->degree)==1)
						 <?php echo ('imediate'); ?>
					 @endif
					 @if (($patient->degree)==2)
						 <?php echo ('grave'); ?>
					 @endif
					 @if (($patient->degree)==3)
						 <?php echo ('stable'); ?>
					 @endif
					 @if (($patient->degree)==4)
						 <?php echo ('bonne'); ?>
					 @endif
					 </td>
                     <td>{{$patient->remark}}</td>
                   
 					
					 <td>{{$patient->created_at}}</td>
					 <td>

 						<a href="{{url('patient/'.$patient->id)}}" class="btn btn-success">details</a>
                        <!--<a href="{{url('medecin/create')}}" class="btn btn-danger danger">consulter</a> psa dartli problem -->
                        <a href="{{url('medecin/'.$patient->id)}}" class="btn btn-danger danger">consulter</a>

 					</td>
 				   @endif


 				</tr>
 				@endforeach
				 
			    @else
				<p>Patient pas trouver</p>
				@endif
 			</tbody>

 		</table>

 	</div>
 </div>



</div>






@endsection
