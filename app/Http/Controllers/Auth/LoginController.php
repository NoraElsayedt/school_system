<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Traits\AuthTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{ 
    use AuthTrait;
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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function loginForm($type)
    {

        return view('auth.login', compact('type'));
    }


    public function login(Request $request){

      Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password]);
       return $this->redirect($request);
      

    }

    public function logout(Request $request,$type)
    {
        // return $type;
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
