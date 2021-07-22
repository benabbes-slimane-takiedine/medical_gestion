<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Http\Requests\PaRequest;
use DB;
use auth;
use App\User;

class HopitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        return $this->middleware('auth');
    }
    public function index()
    {     if(Auth::user()->job=="Infirmier"){

        $patients = DB::select('select * from patients where degree=0 ');
       
        return view('interface.indexinf')->with('patients',$patients);
       
        $listcv=DB::select('SELECT *from patients where degree=0 ORDER by created_at');
       
       
        return view('interface.indexinf',['patients'=>$listcv]);}
        elseif(Auth::user()->job=="Agent d'acceuil")
        {
           $listcv=Patient::all();
           return view('interface.index',['patients'=>$listcv]);}
        else{
            return redirect('medecin');   


        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interface.creerpatient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {   $this->validate($request,[
        'prenom'=>'required|min:5',
         'nom'=>'required|max:40',
         'remark'=>'required'

    ]);
        $patient=new Patient();
        $patient->nom=$request->input('nom');
        $patient->prenom=$request->input('prenom');
        $patient->date_naissance=$request->input('date');
        $patient->Sexe=$request->input('Sexe');
        $patient->adressA=$request->input('adress');

        $patient->user_id=Auth::user()->id;
        
        $patient->remark=$request->input('remark');
        $patient->save();
        return redirect('patient')->with('success','Patient est ajouté');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {$patient=Patient::find($id);
        return view('interface.detail')->with('patient',$patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $patient=Patient::find($id);
    if(Auth::user()->job=="Infirmier"){
        return view('interface.editinf',['patient'=>$patient]);}
      else{
  	return view('interface.edit',['patient'=>$patient]);}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $patient=Patient::find($id);
       

        if(Auth::user()->job=="Infirmier"){
            $this->validate($request,[
                'degree'=>'required']);
            $patient->degree=$request->input('degree');
            $patient->user_id=$request->input('isd');   
            $patient->save();
            $doc=User::find($patient->user_id);
            $doc->nbr_pat++;
            $doc->save();
            return redirect('patient')->with('success','Patient évaluer');


        }
        else{
            $this->validate($request,[
                'prenom'=>'required|min:5',
                 'nom'=>'required|max:40',
                 'remark'=>'required'
        
            ]);
        $patient->nom=$request->input('nom');
        $patient->prenom=$request->input('prenom');
        $patient->date_naissance=$request->input('date');

        $patient->remark=$request->input('remark');
        $patient->save();
        return redirect('patient')->with('success','Patient est modifié');
      }

  
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $patient=Patient::find($id);
        $patient->delete();
        return redirect('ambulance');
    }
    public function ajoutersoin($id){
        $patient=Patient::find($id);
        return view('interface.ajsoin')->with('patient',$patient);
    }
}
