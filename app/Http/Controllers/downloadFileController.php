<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fillier;
use App\User;
use App\Module;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Cour;
use App\Td;
use App\Tp;
use Illuminate\Support\Str;
use Cookie;
class downloadFileController extends Controller
{
    public function indexModule(Request $req){
        $fillierId=User::find(Auth::id())->fillier_id;
        $modules=Fillier::find($fillierId)->modules;
     //   $moduleE=Module::find($id)->has('annee', '=', 2020)->get();
      return view('rep.downloadHome',compact('modules'));
    }
    public function indexCours(Request $req,$id){

      
      $u=$req->session()->get('moduleID');
      $module=Module::find($id);

      if($req->has('search')){
        

        $cours = Cour::search($req->get('search'))->with('module')->where('module_id',$u)->get();	     
      //  $cours=$module->cours;
      
    	}else{
        $cours=$module->cours;
        $req->session()->put('moduleID', $id);
    	}

        
         return view('rep.downloadCours',compact('cours','u'));


    }
    public function downloadCours($id)
{    $cour=Cour::find($id);
    $path= $cour->lien;
    $fileName=Str::afterLast($path,'/');
    $cour->downloadCount+=1;
    $cour->save();
    $headers = array(
              'Content-Type: application/pdf',
            );

    return Storage::download($path,$fileName, $headers);
}
public function indexTDs($id){   
   $cour=Cour::find($id);
   $tds=$cour->tds;
   return view('rep.downloadTDs',compact('tds'));
}
public function indexTPs($id){   
  $cour=Cour::find($id);
  $tps=$cour->tps;
  return view('rep.downloadTPs',compact('tps'));
}
public static function imagePathCour(Cour $cour){
  $fileName=Str::afterLast($cour->lien,'/');
  $extension=Str::afterLast($fileName,'.');
  if($fileName!=null)
  return 'images/fichier/'.$extension.'.png';
  else return 'images/fichier/empty.png';
}
public static function imagePathTD(Td $td,$content){
  $fileName=Str::afterLast($td->$content,'/');
  $extension=Str::afterLast($fileName,'.');
  if($fileName!=null)
  return 'images/fichier/'.$extension.'.png';
  else return 'images/fichier/empty.png';
}
public static function imagePathTP(Tp $tp,$content){
  $fileName=Str::afterLast($tp->$content,'/');
  $extension=Str::afterLast($fileName,'.');
  if($fileName!=null)
  return 'images/fichier/'.$extension.'.png';
  else return 'images/fichier/empty.png';
}
public function downloadEnonceTDs($id)
{    $td=Td::find($id);
    $path= $td->lien_ennonce;
    $fileName=Str::afterLast($path,'/');

    $headers = array(
              'Content-Type: application/pdf',
            );
   $td->download_count+=1;
   $td->save();
    return Storage::download($path,$fileName, $headers);
}
public function downloadCorrectionTDs($id)
{    $td=Td::find($id);
    $path= $td->lien_correction;
    $fileName=Str::afterLast($path,'/');

    $headers = array(
              'Content-Type: application/pdf',
            );
            $td->download_count+=1;
            $td->save();
    return Storage::download($path,$fileName, $headers);
}
public function downloadEnonceTPs($id)
{    $tp=Tp::find($id);
    $path= $tp->lien_ennonce;
    $fileName=Str::afterLast($path,'/');

    $headers = array(
              'Content-Type: application/pdf',
            );
            $tp->download_count+=1;
            $tp->save();
    return Storage::download($path,$fileName, $headers);
}
public function downloadCorrectionTPs($id)
{    $tp=Tp::find($id);
    $path= $tp->lien_correction;
    $fileName=Str::afterLast($path,'/');

    $headers = array(
              'Content-Type: application/pdf',
            );
            $tp->download_count+=1;
            $tp->save();
    return Storage::download($path,$fileName, $headers);
}



}
