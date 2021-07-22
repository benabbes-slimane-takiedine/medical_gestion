@extends('layouts.master')
@section('content')

<div class="container-fluid">
 <div class="row">
 	<div class="col-md-12">

 		<h1>List des adress</h1>
<table class="table">
 			<thead>
 				<tr>
 					<th>nom</th>
 					<th>prenom</th>
 					<th>adress</th>
                   
					

 				</tr>

 			</thead>
 			<tbody>
             	@if(count($patients)>0)

 				<tr>
            		@foreach($patients as $patient)
		      @if( auth()->user()->id == $patient->aum_id)


 					<td>
 						{{$patient->nom}}
     					</td>
 					<td>  
                        {{$patient->prenom}}  
                    </td>
 					<td>
                    {{$patient->adressA}}  

                      </td>
                     
                      @endif
              </tr>
              @endforeach
              
              </tbody>
               @else
				<p>Patient pas trouver</p>
				@endif
              </table>
</div>
</div>
</div>

@endsection

@section('javascript')
 <div id="mapid" style="height:180px;"></div>

  </div>



<script>

  const mymap = L.map('mapid').setView([ 36.36 ,6.6095], 13);

  const urlt="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
  const attribution=  '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributor';
 const tiles= L.tileLayer(urlt,{attribution});
 tiles.addTo(mymap);

 L.Control.geocoder().addTo(mymap);

</script>

@endsection