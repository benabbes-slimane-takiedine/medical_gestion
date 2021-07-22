@extends('layouts.master')
@section('content')

<div class="container-fluid">
 <div class="row">
 	<div class="col-md-12">

 		<h1>List des Patient</h1>
 		<div class="pull-right" style="margin-left:80%;margin-top:25px;"><a href="{{url('patient/create')}}" class="btn btn-success"style="width:80px;"> creer</a></div>
 		<table class="table">
 			<thead>
 				<tr>
 					<th>nom</th>
 					<th>prenom</th>
 					<th>date</th>
					 <th>Sexe</th>
 					<th>remark</th>
                     
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
					 <td>@if (($patient->Sexe)==1)
						 <?php echo ('Male'); ?>
					 @endif
					 @if (($patient->Sexe)==2)
						 <?php echo ('Femele'); ?>
					 @endif
					 </td>
                     <td>{{$patient->remark}}</td>
                   
 					
					 <td>{{$patient->created_at}}</td>
					 <td>

 						<a href="{{url('patient/'.$patient->id)}}" class="btn btn-success">details</a>
                        <a href="{{url('patient/'.$patient->id.'/edit')}}" class="btn btn-default">editer</a>
						@if(!$patient->adressA==""&&!$patient->affecter==1)
						 <a href="{{url('ambulance/'.$patient->id.'/edit')}}" class="btn btn-primary">affecter a aumbulancier</a>
                        @endif
                         

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
