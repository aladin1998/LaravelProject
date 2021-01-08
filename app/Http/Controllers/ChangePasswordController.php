<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
  

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('changePassword');
    } 
    public function store(Request $request)
    {
      
        $request->validate([
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        $user=User::find(Auth::id());
        $user->update(['password'=> Hash::make($request->new_password)]);
        return view('ScuccessChangePassword');
    }
}
