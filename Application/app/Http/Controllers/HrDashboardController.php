<?php

namespace App\Http\Controllers;
use DateTime;
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
        $user=auth()->user();
        $context=array(
            'user'=>$user,
            'profile'=>$user->profile,
            'date'=>DateTime::createFromFormat('Y-m-d H:i:s',$user->profile->dob)->format('F j, Y'),
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
