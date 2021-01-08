<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;

class ChangeEmailController extends Controller
{
    public function store(Request $request)
    {
      
      
      $request->validate([
            'new_email' => 'required|email|unique:users,email,',
          
        ]);
        $user=User::find(Auth::id());
        $user->update(['email'=> $request->new_email]);
        $email=$request->new_email;
        return view('ScuccessChangeEmail',compact('email'));
    }}
