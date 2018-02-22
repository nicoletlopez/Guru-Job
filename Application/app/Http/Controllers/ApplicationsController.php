<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hr = auth()->user()->hr;
        $jobs = $hr->jobs;
        $applicants = array();
        foreach($jobs as $job)
        {
            foreach($job->applicants as $applicant)
            {
                if($job->applicants->count() > 0)
                {
                    array_push($applicants,$applicant);
                }
                else
                {
                    continue;
                }
            }
        }
        /*return $applicants[0];*/
        $context =
            [
                'applicants' => $applicants,
            ];
        return view('hr.manage-applications')->with($context);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $faculty = auth()->user()->faculty;
        $job =  Job::find($request->input('job-id'));
        $job->applicants()->save($faculty);
        $job->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
