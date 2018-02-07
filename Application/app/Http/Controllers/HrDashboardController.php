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
        return view('hr.profile');
    }
    public function manage_jobs(){
        return view('hr.manage-jobs');
    }

    public function manage_applications(){
        return view('hr.manage-applications');
    }
}
