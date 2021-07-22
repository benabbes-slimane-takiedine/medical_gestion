<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\User;
use App\Patient;
use DB;
use App\Message;

class AumController extends Controller
{
    public function update(Request $request, $id){
        $patient=Patient::find($id);
        $patient->aum_id=$request->input('isd');   
        $patient->affecter=1;
        $patient->save();
        return redirect('patient')->with('session','patient a été affecté');
      
      }
      public function index(){
          $message=DB::select('SELECT * FROM messages ORDER BY created_at desc ');
           return view('interface.message')->with('messages',$message);
      }
      public function store(Request $request){
      $message=new Message();
        $message->nom=$request->input('name');
        $message->message=$request->input('message');
        $message->sujet=$request->input('sujet');

        $message->save();
        return redirect('/');


      }
      public function show($id){
          $message=Message::find($id);
          return view('interface.mesage')->with('message',$message);
      }

}
