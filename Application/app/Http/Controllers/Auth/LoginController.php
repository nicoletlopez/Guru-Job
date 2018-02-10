<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    protected function logout(Request $request){
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect(route('hr-dashboard'));
    }

    //protected $redirectTo = '/dashboard';
    protected function authenticated($request, $user)
    {
        if($user->type === 'HR') {
            return redirect()->intended(route('hr-dashboard'));
        }
        return redirect()->intended(route('dashboard'));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
