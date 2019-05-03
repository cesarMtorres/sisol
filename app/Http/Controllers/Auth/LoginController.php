<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';

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
       $credentials=$request->only('email','password');

          
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
         return redirect()->intended('dashboard'); // esta linea iva arriba
        }

        return redirect()->back()
        ->withErrors(['email'=>'Estas credenciales no coinciden con nuestros registros'])
        ->withInput($request->only('email','password'));
    }

    public function ShowLoginForm(){
        return view('login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('loginform');
    }
}
