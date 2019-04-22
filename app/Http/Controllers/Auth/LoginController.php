<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

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
        $this->validate($request,[
            'email' => 'required|email',
            'password'=> 'required|min:6'
        ]);
        return redirect()->intended(route('app.dashboard'));
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
            
        }

        return redirect()->back()
        ->withInput($request->only('email','remember'));
    }

    public function ShowLoginForm(){
        return view('login');
    }

    public function logout(){

        return redirect()->route('login');
    }
}
