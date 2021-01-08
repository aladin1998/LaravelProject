<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }
  
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $validator = Validator::make($request->all(), [
         
          
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 1 && auth()->user()->is_represantant == 0 ) {
                return redirect()->route('admin.home');
            }
            else if(auth()->user()->is_represantant == 1 && auth()->user()->is_admin == 0){
                return redirect()->route('rep.home');
            }
            
            else{
                $validator->errors()->add('error','
                e-mail ou le mot de passe incorrect');
                return redirect()->route('login')->withErrors($validator);

            }
        }else{
            $validator->errors()->add('error','e-mail ou le mot de passe incorrect');
            return redirect()->route('login')
            ->withErrors($validator);
        }
          
    }
    public function logout(Request $request)
{
    $this->performLogout($request);
    return redirect()->route('login');
}
protected function authenticated(Request $request, $user)
{
    if ($request->session()->has('moduleID')) {
    $sessionData = $request->session()->get('moduleID');
        return redirect()->route('rep.search');
    }

    return redirect($this->redirectTo);
}
}
