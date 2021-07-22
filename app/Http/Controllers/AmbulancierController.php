<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\User;
use App\Patient;
use DB;
class AmbulancierController extends Controller
{
  public function index(){
    $patients = DB::select('SELECT * from patients where adressA IS NOT NULL ');

    return view('interface.ambulance')->with('patients',$patients);
  }
  public function update(Request $request, $id){
  $med=User::find($id);
  if($med->job=="Ambulancier"){

    $med->dispoau=$request->input('dispo');
    $med->save();
    return redirect('ambulance');
  }
  else{
  $med->dispo=$request->input('dispo');
  $med->save();
  return redirect('medecin');
}
    
  }
  
  public function edit($id)
{
  $patient=Patient::find($id);

      return view('interface.adress')->with('patient',$patient);


}


}
