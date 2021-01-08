<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\Enseignant;
use App\User;
use App\Fillier;
use App\Departement;
use App\Cour;
use App\Td;
use App\Tp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use Illuminate\Http\File;
use Illuminate\Support\Str;


class sendFileController extends Controller
{
    public function index(){
        return view('rep.sendFile');
    }
    public function indexContent(){

        return view('rep.sendFileContent');
    }
    public function indexCour(Request $req){
       $fillierId=User::find(Auth::id())->fillier_id;
       $fillier=Fillier::find($fillierId);
       //store fillier id in a session
       $req->session()->put('fillier',$fillierId);

       return view('rep.sendFileCour',['fillier'=>$fillier],compact('testSession'));
    }

    public function storeCour(Request $req){
        $req->validate([
            'file' => 'mimes:pdf,docx,doc,zip,rar',
           
        ]);
        $prof=Enseignant::find($req->input('prof'))->nom;
        $module=Module::find($req->input('module'))->libelle;
        $fillier=Fillier::find($req->session()->get('fillier'))->libelle;
        $chemin='/'.$fillier.'/'.date("Y").'/'.$module.'/'.$prof.'/cours'.'/'.$req->input('titre');
     if(!Storage::exists($chemin)) {

            Storage::makeDirectory($chemin); //create directory      
                
        }
      // put the file inside the directory
      //  Storage::put('/'.$fillier.'/'.date("Y").'/'.$module.'/'.$prof, $req->file('file'),'public');

            $cour=new Cour;
         
           if (!$cour->where('titre', '=',$req->input('titre'))->exists()) {
            $cour->titre = $req->input('titre');
            $cour->lien= Storage::putFile($chemin,$req->file('file'));
            $cour->module_id=$req->input('module');
            $cour->downloadCount=0;
            $cour->save();
            return view('rep.successSendCour');
         }
         else {
             return 'titre existe déja';
         }              
            
    }
    public function storeTD(Request $req){

        $cour=Cour::find($req->input('cours')); 
        $TD=TD::where([

            ['cour_id','=',$cour->id],
    
            ['numero', '=',$req->input('numero')]])->first();   
        $champ='';
        $chemin= Str::beforeLast($cour->lien,'/');
        $chemin.='/TDs';
        $file=$req->file('file');
        $fileName='';
        $numero=$req->input('numero');
        $extension=$file->getClientOriginalExtension();
        //Storage::disk('local')->put('file.txt', 'Contents');


        if($TD==null && $req->input('type')=='enonce'){

            $fileName='enonnce_TD'.$numero.'.'.$extension;
            $champ='lien_ennonce';
        
        /*else {
           // $chemin.='/correction';
           $fileName='correction_TD'.$numero.'.'.$extension;
            $champ='lien_correction';
        }*/
            $td=new Td;
            $td->cour_id=$req->input('cours');
            $td->$champ=Storage::putFileAs($chemin,$file,$fileName);
            $td->numero=$numero;
            $td->save();
            return view('rep.successSendCour');
    }
    else if($TD!=null && $req->input('type')=='correction' ){
               /*    $chemin.='/correction';
                   $fileName='correction_TD'.$numero.'.'.$extension;
                   $champ='lien_correction';*/
                   
                   $fileName='correction_TD'.$numero.'.'.$extension;
                   $champ='lien_ennonce';
                   $TD->lien_correction=Storage::putFileAs($chemin,$file,$fileName);
                   $TD->save();
                   return view('rep.successSendCour');

    }
    else {
        return 'numéro de td exist deja';
    }
         }
            
            
    
    public function indexTD(Request $req){
        $fillierId=User::find(Auth::id())->fillier_id;
        $fillier=Fillier::find($fillierId);
        
        //store fillier id in a session
        $req->session()->put('fillier',$fillierId);
        $content='TD';
 
        return view('rep.sendFileTD_TP',compact('testSession','fillier','content'));
     }
     public function indexTP(Request $req){
        $fillierId=User::find(Auth::id())->fillier_id;
        $fillier=Fillier::find($fillierId);
        //store fillier id in a session
        $req->session()->put('fillier',$fillierId);
        $content='TP';
 
        return view('rep.sendFileTD_TP',compact('testSession','fillier','content'));
     }
     public function storeTP(Request $req){
        $cour=Cour::find($req->input('cours')); 
        $TP=TP::where([

            ['cour_id','=',$cour->id],
    
            ['numero', '=',$req->input('numero')]])->first();   
        $champ='';
        $chemin= Str::beforeLast($cour->lien,'/');
        $chemin.='/TPs';
        $file=$req->file('file');
        $fileName='';
        $numero=$req->input('numero');
        $extension=$file->getClientOriginalExtension();


        if($TP==null && $req->input('type')=='enonce'){

            $fileName='enonnce_TP'.$numero.'.'.$extension;
            $champ='lien_ennonce';
        
            $tp=new Tp;
            $tp->cour_id=$req->input('cours');
            $tp->$champ=Storage::putFileAs($chemin,$file,$fileName);
            $tp->numero=$numero;
            $tp->save();
            return view('rep.successSendCour');
    }
    else if($TP!=null && $req->input('type')=='correction' ){

                   
                   $fileName='correction_TP'.$numero.'.'.$extension;
                   $champ='lien_ennonce';
                   $TP->lien_correction=Storage::putFileAs($chemin,$file,$fileName);
                   $TP->save();
                   return view('rep.successSendCour');

    }
    else {
       return 'numéro de td exist deja'.$TP.' '.$req->input('type');
       
    }
     }
}
