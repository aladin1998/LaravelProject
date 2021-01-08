<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fillier;

class UploadsController extends Controller
{
    public function indexUploads(){
        $fillierId=User::find(Auth::id())->fillier_id;
        $modules=Fillier::find($fillierId)->modules;
      //  $cours=$module->cours;

        return view('rep.myUploads',compact('modules'));  
    }
}
