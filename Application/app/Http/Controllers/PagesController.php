<?php

namespace App\Http\Controllers;

use App\Specialization;
use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PagesController extends Controller
{
    public function index()
    {
        if (!auth()->guest()) {
            if (auth()->user()->type == 'FACULTY') {
                return redirect(route('dashboard'));
            } elseif (auth()->user()->type == 'HR') {
                return redirect(route('hr-dashboard'));
            }
        }
        /*$start = microtime(true);

        $jobs = Cache::remember('jobs', 10, function () {
            return Job::orderBy('created_at', 'desc')->paginate(4);
        });*/

        //$jobs = Job::orderBy('created_at','desc')->paginate(4);

        //$end = (microtime(true) - $start) * 1000;

        //Log::info('With cache: ' . $end . ' ms.');

        $specializations = Specialization::pluck('name','name');
        $specializations->prepend('All Specializations','')->all();
        $context = array(
            'jobs' => Job::orderBy('created_at', 'desc')->paginate(4),
            'specializations' => $specializations,
            //'jobs' => Job::orderBy('created_at','desc')->paginate(4),
        );
        return view('pages.home')->with($context);
    }
}
