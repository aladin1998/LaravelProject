<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ListController extends Controller
{
    public function index(){
      $reps=User::where('is_represantant',1)->with('fillier')->get();

      return view('admin.listRep',compact('reps'));

    }
}
