<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class changePhotoController extends Controller
{
    public function store(Request $req){
        $file=$req->file('file');
       $user=User::find(Auth::id());
       $user->linkPhoto=Storage::putFile('/public/photos',$req->file('file'));
       $user->save();
       return Redirect::route('myAccount');
    }
}
