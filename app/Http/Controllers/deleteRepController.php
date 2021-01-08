<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fillier;
use App\User;
class deleteRepController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $filliers=Fillier::all();
     

        return view('admin.deleteRep',compact('filliers'));
    }
    public function envoyer(Request $req){
        $etudiant=User::where([
            ['is_represantant',1],
            ['fillier_id',$req->input('classe')],
            ['CNE',$req->input('cne')],         
        ])->get();
         
        

             return view('admin.confirmDelete',compact('etudiant'));
    }
    public function confirmer($id){
        $user = User::find($id);
        $source="rejet";
        $user->is_represantant=0;
        $user->save();
        return view('admin.success',['test'=>$user,'source'=>$source]);
    }
}
