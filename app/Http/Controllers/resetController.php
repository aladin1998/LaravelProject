<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class resetController extends Controller
{
 
    public function email(Request $req){
          $user=User::whereEmail($req->email)->first();

          if(!$user){
              return redirect()->back()->with(['error','Retapez votre email']);
             
            }
          
          else{
            $code = mt_rand(1000,9999);
            $req->session()->put('code',$code);
            $req->session()->put('idUser',$user->id);
           // $req->session()->get('code');
        
             Mail::send('email.forgot',['user' => $user,'code' => $code],function($message) use($user){
                $message->to($user->email);
                $message->subject("Réinitialisation de votre mot","Réinitialisation de votre mot");
              });
              return view('auth.verify');
             // return redirect()->back()->with(['success','un code composé de quatre chiffre à éte envoyé a votre boite mail ']);
          }
      
    }
    public function confirm(Request $req){
       //$req->session()->get('code');
       $user=User::find($req->session()->get('idUser'));

       if($req->code==$req->session()->get('code')){
        Auth::login($user);
        return view('auth.passwords.reset');
       }
       else return redirect()->route('password.request')->with(['error','Renvoyer un code à votre email']);
        
    }

    public function updatePassword(Request $req){
      /*  $req->validate([
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
           
        ]);
            $user=User::find($req->session()->get('idUser'));
          
            $user->update(['password'=> Hash::make($req->new_password)]);
            return redirect()->back();
    }*/
    $req->validate([
        'new_password' => ['required'],
        'new_confirm_password' => ['same:new_password'],
    ]);
    $user=User::find($req->session()->get('idUser'));
    $user->update(['password'=> Hash::make($req->new_password)]);
    return view('ScuccessChangePassword');
   
}
}
