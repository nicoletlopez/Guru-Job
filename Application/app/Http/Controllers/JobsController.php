<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJob;
use App\Http\Requests\EditJob;
use App\Mail\AcceptJobNotification;
use App\Mail\NewJobNotification;
use App\Subject;
use App\User;
use App\Faculty;
use Illuminate\Http\Request;
use App\Job;
use App\Hr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function store(CreateJob $request)
    {
        //
        $user_id = auth()->user()->id;
        $title = $request->input('title');
        $type = $request->input('type');
        $minSalary = $request->input('min-salary');
        $maxSalary = $request->input('max-salary');
        $desc = $request->input('description');

        $job = new Job;
        $job->user_id = $user_id;
        $job->title = $title;
        $job->desc = $desc;
        $job->type = $type;
        $job->floor_salary = $minSalary;
        $job->ceiling_salary = $maxSalary;

        $job->save();

        //Edit the foreign keys of the chosen subjects as children of the new job
        $subject_ids = $request->input('subjects');

        foreach ($subject_ids as $subject_id) {
            $subject = Subject::find($subject_id);
            $subject->job_id = $job->id;
            $subject->save();
        }

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
    public
    function show($id)
    {
        $context = array(
            //'applicationData'=>$applicationData,
            'job' => Job::find($id),
            'subjects' => Job::find($id)->subjects,
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
        return back();
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

        Mail::to($school->name)->queue(new AcceptJobNotification($job, $user, $school));

        return back();
    }


    //user searches for a job posting using various criteia
    public function search(Request $request)
    {
        $search_term = $request->input('search-term');
        $region = $request->input('region');
        $specialization = $request->input('specialization');
        $free_day = $request->input('free-day');


//        $jobs = Job::region($region)->freeDay($free_day)->specialization($specialization)->searchTerm($search_term);

        $jobs = Job::searchTerm($search_term);
        if(!is_null($free_day)){
            $jobs->freeDay($free_day);
        }
        if(!is_null($specialization)){
            $jobs->specialization($specialization);
        }
        if(!is_null($region)){
            $jobs->region($region);
        }
        if (is_null($search_term) and is_null($specialization) and is_null($free_day) and is_null($region)) {
            $jobs = Job::orderBy('created_at', 'desc');
        }

        $context = array(
            'jobs' => $jobs->paginate(4),
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

}
