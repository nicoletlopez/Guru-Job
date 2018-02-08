<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $data=array(
           'title'=>'Services',
           'services'=>['Web Design','Programming','SEO']
       );
        */
        $context = array(
            'jobs' => Job::orderBy('title')->paginate(4),
        );
        return view('jobs.job-listings')->with($context);
    }

    public function search(Request $request)
    {
        $s=$request->input('s');
        $context = array(
            'jobs'=>Job::search($s)->paginate(4),
        );
        return view('jobs.job-listings')->with($context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = auth()->user()->name;
        $title = $request->input('title');
        $type = $request->input('type');
        $work_days = $request->input('day');
        $salary = $request->input('salary');
        $desc = $request->input('description');

        return $work_days;

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $context=array(
            'job'=>Job::find($id)
        );
        return view('jobs.job-details')->with($context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
