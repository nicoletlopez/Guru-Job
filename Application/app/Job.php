<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = 'job';
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function subjects()
    {
        return $this->hasMany('App\Subject','job_id','id');
    }

    public function hr()
    {
        return $this->belongsTo('App\Hr','user_id','user_id');
    }

    public function faculties()
    {
        return $this->belongsToMany('App\Faculty','application','job_id','user_id')
            ->withTimestamps()
            ->using('App\Application');
    }

    public function scopeSearch($query, $s){
//        $s += 1;
//        $duh = Subject::pluck($s);
        return $query->where('title', 'like', '%' .$s. '%')
            ->orWhere('desc', 'like', '%' .$s. '%');
    }

    /*public function jobAtSchedule()
    {
        //get all the jobs that a user currently has
        $jobs = Array();
        $jobs = auth()->user()->jobs;

        $context = ['jobs',$jobs];

        return view('jobs.job-by-schedule')->with($context);
    }*/
}
