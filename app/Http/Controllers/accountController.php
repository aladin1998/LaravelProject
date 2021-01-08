<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Str;
class accountController extends Controller
{
    public function index(){
        $user =User::find(Auth::id());
        $fileName=Str::after($user->linkPhoto,'public/');
        
        return view('myAccount',compact('user','fileName'));
       

    }
}
