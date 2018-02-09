<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HrDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('hr.dashboard');
    }
    public function profile(){
        $context=array(
            'user'=>auth()->user(),
            'profile'=>auth()->user()->profile,
        );
        return view('hr.profile')->with($context);
    }
    public function manage_jobs(){
        return view('hr.manage-jobs');
    }

    public function manage_applications(){
        return view('hr.manage-applications');
    }
}
