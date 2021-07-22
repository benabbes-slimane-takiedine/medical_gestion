<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Http\Requests\PaRequest;
use DB;
use App\User;
use App\Orientation;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$patient = Patient::(auth()->user()->id == $patient->user_id)
        $patient=DB::select('SELECT *from patients  where traitee=0 ORDER by degree,created_at');
        return view('interface.tabmed')->with('patients',$patient);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $t=auth()->user()->id;
        $patients=DB::select("SELECT *from patients where user_id = $t");
        return view('interface.consulter')->with('patients',$patients);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient=Patient::find($id);
        /*
        $doc = User::find($patient->user_id);
        $doc->nbr_pat--;
        $doc->save();
        */
        return view('interface.consulter')->with('patient',$patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $or=new Orientation();
        $or->letter_ori=$request->input('orientation');
        $or->id_pat=$id;
        $or->id_med=auth()->user()->id;
        $or->save();
        $patient=DB::select('SELECT *from patients where traitee=0 ORDER by degree,created_at');
        $doc=User::find(auth()->user()->id);
        $doc->nbr_pat--;
        if($doc->nbr_pat=-1){
            $doc->nbr_pat++;

        }
        $doc->save();
        $pat=Patient::find($id);
        $pat->traitee=1;
        $pat->save();
        return view('interface.tabmed')->with('patients',$patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
