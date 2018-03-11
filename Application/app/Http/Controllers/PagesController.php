<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\Cache;
class PagesController extends Controller
{
    public function index(){

        $jobs = Cache::remember('jobs',22*60,function ()
        {
           return Job::orderBy('created_at','desc')->paginate(4);
        });

        $context = array(
            'jobs' => $jobs,
            //'jobs' => Job::orderBy('created_at','desc')->paginate(4),
        );

        return view('pages.home')->with($context);
    }
}
