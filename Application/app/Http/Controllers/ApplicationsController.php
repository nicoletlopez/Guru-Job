<?php

namespace App\Http\Controllers;

use App\Mail\AcceptJobNotification;
use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

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
        //$jobs = auth()->user()->hr->jobs;

//        $applications = auth()->user()->hr->jobs;
//
//        $context =
//            [
//                'jobs'=>$applications,
//            ];
//        return view('hr.manage-applications')->with($context);
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
        $user = $faculty->user;
        $job =  Job::find($request->input('job-id'));
        $job->applicants()->save($faculty);
        $job->save();

        //refresh the cached applications as a new one has been made


        $school = $job->hr->user;

        Mail::to($job->hr->user->email)->queue(new AcceptJobNotification($job, $user, $school));

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

    public function applicants($id){
        $job = Job::find($id);
        $applicants = $job->applicants;

        $context =
            [
                'job'=>$job->title,
                'id'=>$job->id,
                'applicants'=>$applicants,
            ];
        return view('jobs.applications.applicants')->with($context);
    }

    public function search(Request $request, $id){
        $job = Job::find($id);
        $search_term = $request->input('search-term');

        $faculties = $job->applicants;
        $applicants = array();

        foreach($faculties as $faculty){
            $haystack = $faculty->user->name;
            if(stripos(strtolower($haystack),strtolower($search_term))  !== false){
                array_push($applicants,$faculty);
            }
        }

        if(is_null($search_term)){
            $applicants = $faculties;
        }else{
            $applicants = collect($applicants);
        }

        $context = [
            'job'=>$job->title,
            'id'=>$job->id,
            'applicants'=>$applicants,
        ];

        return view('jobs.applications.applicants')->with($context);
    }
}
