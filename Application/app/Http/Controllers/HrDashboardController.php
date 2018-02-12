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
            'date'=>Controller::formatDate($user->profile->dob),
            /*'date'=>DateTime::createFromFormat('Y-m-d H:i:s',$user->profile->dob)->format('F j, Y'),*/
        );
        return view('hr.profile')->with($context);
    }
    public function manageJobs(){
        return view('hr.manage-jobs');
    }

    public function manageApplications(){
        return view('hr.manage-applications');
    }
}
