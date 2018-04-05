<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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

        /*$user = Cache::remember('user',20,function()
        {
            return auth()->user();
        });

        $profile = Cache::remember('profile',20,function() use (&$user)
        {
           return $user->profile;
        });

        $date = Cache::remember('date',20,function() use (&$profile)
        {
           return Controller::formatDate($profile->dob);
        });*/

        $user = auth()->user();
        $profile = $user->profile;
        $date = Controller::formatDate($profile->dob);


        $context=array(
            'user'=>$user,
            'profile'=>$profile,
            'date'=>$date,
            /*'date'=>DateTime::createFromFormat('Y-m-d H:i:s',$user->profile->dob)->format('F j, Y'),*/
        );
        return view('hr.profile')->with($context);
    }

    public function manageNotifications(){
        return view('notifications.notifications-index');
    }
    public function manageJobs(){
        //$hr=auth()->user()->hr;

        /*$jobs = Cache::remember('jobs',20,function()
        {
            return auth()->user()->hr->jobs;
        });*/

        $jobs = auth()->user()->hr->jobs;

        $context=array(
            'jobs'=>$jobs,
        );
        return view('hr.manage-jobs')->with($context);
    }


    /*public function manageApplications(){
        return view('hr.manage-applications');
    }*/
}
