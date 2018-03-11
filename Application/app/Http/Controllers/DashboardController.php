<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->profile){
            return redirect()->route('profile.create');
        }
        return view('faculty.dashboard');
    }
    public function profile(){
        if(!auth()->user()->profile){
            return redirect()->route('profile.create');
        }
        $user=auth()->user();

        //randomly retrieved pictures don't seem to get along well with caching so
        //until we have an actual picture i'll just comment out the caching portion
        /*
        $user = Cache::remember('user',20,function()
        {
            return auth()->user();
        });
        $profile = Cache::remember('profile',20,function()
        {
            return auth()->user()->profile;
        });
        */

        $context=array(
            'user'=>$user,
            'profile'=>auth()->user()->profile,
            'date'=>Controller::formatDate($user->profile->dob),
        );
        return view('faculty.profile')->with($context);
    }
    public function notifications(){
        return view('faculty.notifications');
    }
}
