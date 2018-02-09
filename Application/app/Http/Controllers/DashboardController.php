<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;

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
        return view('faculty.dashboard');
    }
    public function profile(){
        $context=array(
            'user'=>auth()->user(),
            'profile'=>auth()->user()->profile,
        );
        return view('faculty.profile')->with($context);
    }
    public function notifications(){
        return view('faculty.notifications');
    }
}
