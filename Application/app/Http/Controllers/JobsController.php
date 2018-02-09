<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use App\Job;
use App\Hr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'jobs' => Job::orderBy('created_at', 'desc')->paginate(4),
        );
        return view('jobs.job-listings')->with($context);
    }

    public function search(Request $request)
    {
        $s = $request->input('s');
        $context = array(
            'jobs' => Job::search($s)->paginate(4),
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
        $hr = auth()->user()->hr;
        $context = array(
            'subjects' => $hr->subjects,
        );

        return view('jobs.job-post')->with($context);
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
        $user_id = auth()->user()->id;
        $title = $request->input('title');
        $type = $request->input('type');
        $salary = $request->input('salary');
        $desc = $request->input('description');

        $job = new Job;
        $job->user_id = $user_id;
        $job->title = $title;
        $job->desc = $desc;
        $job->type = $type;
        $job->salary = $salary;

        $job->save();

        //Edit the foreign keys of the chosen subjects as children of the new job
        $subject_ids = $request->input('subjects');

        foreach($subject_ids as $subject_id)
        {
            $subject = Subject::find($subject_id);
            $subject->job_id = $job->id;
            $subject->save();
        }



        return redirect('/jobs/' . $job->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        $context = array(
            'job' => Job::find($id),
            'subjects' => Job::find($id)->subjects,
        );
        return view('jobs.job-details')->with($context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
