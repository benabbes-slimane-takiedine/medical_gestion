@extends('layouts.master')
@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-8">

			<form action="{{url('soin')}}" enctype="multipart/form-data" method="post">
				{{csrf_field()}}
                   <input type="hidden" name="pid" value="{{$patient->id}}">

                 
				<div class="form-group ">
					<label for="">nom de soin</label>
					<input type="text" name="noms" class="form-control" value="{{old('noms')}}">
                    </div>

				<div class="form-group">
					
					<input type="submit" class="form-control btn btn-primary " value="Ajouter soin">
					
				</div>

</form>


</div>
</div>
</div>

@endsection