<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PagesController extends Controller
{
    public function index()
    {


        $start = microtime(true);

        $jobs = Cache::remember('jobs', 10, function ()
        {
            return Job::orderBy('created_at','desc')->paginate(4);
        });

        //$jobs = Job::orderBy('created_at','desc')->paginate(4);

        //$end = (microtime(true) - $start) * 1000;

        //Log::info('With cache: ' . $end . ' ms.');
        $context = array(
            'jobs' => $jobs,
            //'jobs' => Job::orderBy('created_at','desc')->paginate(4),
        );
        return view('pages.home')->with($context);
    }
}
