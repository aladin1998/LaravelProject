<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fillier;
use App\User;
class addRepController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $filliers=Fillier::all();
        return view('admin.addRep',compact('filliers'));
    }
    public function envoyer(Request $req){
        $etudiant=User::where([
            ['fillier_id',$req->input('classe')],
            ['CNE',$req->input('cne')],         
        ])->get();
             return view('admin.confirmAdd',compact('etudiant'));
    }
    public function confirmer($id){
        $user = User::find($id);
        $user->is_represantant=1;
        $user->save();
        $source="ajout";
        return view('admin.success',['test'=>$user,'source'=>$source]);
    }
}
