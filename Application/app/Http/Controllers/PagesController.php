<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
class PagesController extends Controller
{
    public function index(){
        $context = array(
            'jobs' => Job::orderBy('created_at','desc')->paginate(4),
        );
        return view('pages.home')->with($context);
    }
}
