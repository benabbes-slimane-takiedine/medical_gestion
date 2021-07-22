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
 					<th>remark</th>
                     <th>degree</th>
					 <th>Arriver</th>
					 <th>Gérer</th>

 				</tr>

 			</thead>
 			<tbody>
			 @if(count($patients)>0)
 				@foreach($patients as $patient)
 				<tr>

 					<td>
 						{{$patient->nom}} <br>

 					</td>
 					<td>{{$patient->prenom}}</td>
 					<td>{{$patient->date_naissance}}</td>
                     <td>{{$patient->remark}}</td>
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
 					
					 <td>{{$patient->created_at}}</td>
					 <td>

 						<a href="{{url('patient/'.$patient->id)}}" class="btn btn-success">details</a>
                        <a href="{{url('patient/'.$patient->id.'/edit')}}" class="btn btn-default">évaluer</a>
                         

 					</td>
 				   


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
