@extends('layouts.master')
@section('content')

  <?php
                    use App\User;
                    $med = User::find($patient->user_id);

                    
                    ?>

<div class="container">
	

<div class="panel panel-default" style="width:100%;margin-left:20%;">
  <div class="panel-heading">  <h4  style="color:#00b1b1;margin-left:20%;">Fiche de patient</h4>
  @if(auth()->user()->job == "Médecin")
  <div class="pull-right"><a href="{{url('patient/ajoutersoin/'.$patient->id)}}" class="btn btn-success"> Ajouter soin</a></div>
  @endif
  
  </div>
    <div class="col-md-7" style="margin-top:30px;">
            <h4 > <span style="color:#00b1b1;">Medecin traitant:</span>  
                   
<?php 
            if($med->job=="Agent d'acceuil"){
              echo ('pas encore traite');
            }
            else{
              echo($med->name);
            }
            
            ?></h4>
            </div>
   <div class="panel-body">
       
    <div class="box box-info"style="margin-top:30px;">
        
            <div class="box-body">
                   
          
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-md-7  tital form-control" >First Name:       {{$patient->prenom}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div>



<div class="col-md-7 tital form-control " >Last Name:        {{$patient->nom}}</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-md-7  tital form-control" >Date Of Birth:    {{$patient->date_naissance}}</div>
<div class="col-md-7  tital form-control" >Arriver :         {{$patient->created_at}}</div>


  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-md-7  tital form-control"style="height:100px;" ><p>Remark:{{$patient->remark}}</p></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>


 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-md-4  tital form-control " >degree:
  @if (($patient->degree)==0)
						 <?php echo ('non saisis'); ?>
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


</div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>  
    
       
       
       
       
       
       
       
       
   </div>
</div>




         







@endsection