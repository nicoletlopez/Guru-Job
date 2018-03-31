<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJob;
use App\Http\Requests\EditJob;
use App\Mail\NewJobNotification;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\Mail;

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
        $jobs = Job::orderBy('created_at', 'desc')->paginate(4);
        $context = array(
            'jobs' => $jobs,
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

        $user = auth()->user();
        //$subjects = Subject::where('hr_id',$user_id)->get();
        $subjects=$user->hr->subjects;
        $jobs=$user->hr->jobs;



        $subjectsUsed=[];
        foreach($jobs as $job){
            $subjectsUsed[]=$job->subject->id;
        }
        if(!(count($subjects)>count($subjectsUsed))){
            return redirect(route('subjects.create'))->with('warning','A Subject is needed before posting a job');
        }
        $context = array(
            'subjectsUsed' => $subjectsUsed,
            'subjects'=>$subjects,
            'jobs'=>$jobs,
        );


        return view('jobs.job-post')->with($context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateJob $request)
    {
        //
        $user_id = auth()->user()->id;
        $title = $request->input('title');
        $type = $request->input('type');
        $minSalary = $request->input('min-salary');
        $maxSalary = $request->input('max-salary');
        $desc = $request->input('description');
        $subject_id = $request->input('subject');

        $job = new Job;
        $job->hr_id = $user_id;
        $job->title = $title;
        $job->desc = $desc;
        $job->type = $type;
        $job->floor_salary = $minSalary;
        $job->ceiling_salary = $maxSalary;
        $job->subject_id = $subject_id;

        $job->save();

        $users = User::where('type', '=', 'FACULTY')->get();
        $school = $request->user();

        foreach ($users as $user) {
            Mail::to($user->email)->queue(new NewJobNotification($job, $user, $school));
        }

        return redirect('/jobs/' . $job->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!auth()->guest()) {
            if (!auth()->user()->profile) {
                return redirect()->route('profile.create')->with('error', 'Create a Profile First');
            }
        }

        $job = Job::find($id);
        $subject = $job->subject;

        $context = array(
            //'applicationData'=>$applicationData,
            'job' => $job,
            'subject' => $subject,
            'date' => Controller::formatDate(Job::find($id)->hr->user->profile->dob),
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
        $hr = auth()->user()->hr;
        $job = Job::find($id);
        $subjects = $hr->subjects;
        $subjectsSelected = $job->subjects;
        $subjectData = array();
        foreach ($subjectsSelected as $subjectSelected) {
            $subjectData[] = $subjectSelected->id;
        }
        $jobType = $job->type;
        $context = array(
            'job' => Job::find($id),
            'subjects' => $subjects,
            'subjectData' => $subjectData,
            'jobType' => $jobType,
        );
        return view('jobs.job-edit')->with($context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(EditJob $request, $id)
    {
        $job = Job::find($id);
        $title = $request->input('title');
        $type = $request->input('type');
        $salary = $request->input('salary');
        $desc = $request->input('description');
        $minSalary = $request->input('min-salary');
        $maxSalary = $request->input('max-salary');

        $job->title = $title;
        $job->desc = $desc;
        $job->type = $type;
        $job->floor_salary = $minSalary;
        $job->ceiling_salary = $maxSalary;
        $job->save();


        $subject_ids = $request->input('subjects');
        $subjects = $job->subjects;
        foreach ($subjects as $subject) {
            $subject->job_id = null;
            $subject->save();
        }

        foreach ($subject_ids as $subject_id) {
            $subject = Subject::find($subject_id);
            $subject->job_id = $job->id;
            $subject->save();
        }

        return redirect('/jobs/' . $job->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return back()->with('success','Job Deleted');
    }

    //user applies for a job

    public function apply(Request $request, $id)
    {
        $user = $request->user();
        $job = Job::find($id);
        $school = User::find($job->user_id);

        //can either be revoke (0) or apply (1)
        //REVOKE an application
        if ($request->input('apply-option') == 0) {
            $job->faculties->attach($user->id);
        } //APPLY for job
        elseif ($request->input('apply-option') == 1) {
            $job->faculties->detach($user->id);
        }


        return back();
    }


    //user searches for a job posting using various criteia
    public function search(Request $request)
    {
        $search_term = $request->input('search-term');
        $region = $request->input('region');
        $specialization = $request->input('specialization');
        $type = $request->input('type');
        $free_day = $request->input('free-day');
        $start_time = $request->input('start-time');
        $end_time = $request->input('end-time');


//        $jobs = Job::region($region)->freeDay($free_day)->specialization($specialization)->searchTerm($search_term);

        //Search for jobs according to search term even if $search_term is null
        $jobs = Job::searchTerm($search_term);
        if(!is_null($free_day)){
            $jobs->freeDay($free_day);
        }
        //Add region criteria if $region is not null
        if(!is_null($region)){
            $jobs->region($region);
        }
        //Add specialization criteria if $specialization is not null
        if(!is_null($specialization)){
            $jobs->specialization($specialization);
        }
        //Add specialization criteria if $specialization is not null
        if(!is_null($type)){
            $jobs->type($type);
        }
        //add jobs falling after start time
        if(!is_null($start_time) && is_null($end_time)){
            $jobs->startTime($start_time);
        }
        //add jobs falling before end time
        if(is_null($start_time) && !is_null($end_time)){
            $jobs->endTime($end_time);
        }
        //Add jobs falling between start time and end time stated
        if(!is_null($start_time) && !is_null($end_time)){
            $jobs->time($start_time, $end_time);
        }
        //If everything is null, get all jobs
        if(is_null($search_term) and is_null($region) and is_null($specialization) and is_null($type) and
            is_null($free_day) and is_null($start_time) and is_null($end_time)) {
            $jobs = Job::orderBy('created_at', 'desc');
        }

        $context = array(
            'jobs' => $jobs->paginate(),
        );
        return view('jobs.job-listings')->with($context);
    }

    public static function getFacultyJobs()
    {
        $jobsApplied = auth()->user()->faculty->jobs;
        $applicationData = array();
        foreach ($jobsApplied as $jobApplied) {
            $applicationData[] = $jobApplied->id;
        }
        return $applicationData;
    }

    public static function getUsedSubjects(){
        $jobs = auth()->user()->hr->jobs;
        $subjectData=array();
        foreach($jobs as $job){
            $subject=$job->subject->id;
            $subjectData[]=$subject;
        }
        return $subjectData;
    }

}
