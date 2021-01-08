<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cour;
use App\User;
use App\Fillier;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class updateFileController extends Controller
{
    public function editeCour(Request $req,$id){
         $cour=Cour::find($id);
         $fillierId=User::find(Auth::id())->fillier_id;
         $fillier=Fillier::find($fillierId);
  


         return view('rep.editeCour',compact('cour','fillier'));
    }
    public function updateCour(Request $req,$id){
        $request->validate([
            'titre' => 'required',
           
        ]);
       $cour=Cour::find($id);
      // put the file inside the directory
      //  Storage::put('/'.$fillier.'/'.date("Y").'/'.$module.'/'.$prof, $req->file('file'),'public');
      $chemin=Str::beforeLast($cour->lien,'/');
       
      $cour->update(array('titre'=>$req->input('titre')));
      $cour->update(array('lien'=>Storage::putFile($chemin,$req->file('file'))));
      $cour->update(array('downloadCount'=>0));

      return redirect('rep/downloadFile/modules/'.session()->get('moduleID'));
  
        
    }
}
