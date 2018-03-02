<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = 'job';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'job_id', 'id');
    }

    public function hr()
    {
        return $this->belongsTo(Hr::class, 'user_id', 'user_id');
    }

    public function applicants()
    {
        return $this->belongsToMany(Faculty::class, 'application', 'job_id', 'user_id')
            ->withTimestamps();
    }

    public function schedules()
    {
        return $this->hasManyThrough('App\Schedule', 'App\Subject');
    }

    public function scopeSearchTerm($query, $search_term)
    {
        return $query
            //search for name or email in user table
            ->whereHas('hr', function ($query) use ($search_term) {
                $query->whereHas('user', function ($query) use ($search_term) {
                    $query->where('name', 'like', '%' . $search_term . '%')
                        ->orWhere('email', 'like', '%' . $search_term . '%');
                });
            })
            //search for title or description in job table
            ->orWhere('title', 'like', '%' . $search_term . '%')
            ->orWhere('desc', 'like', '%' . $search_term . '%');
    }

    public function scopeRegion($query,$region){
        return $query->whereHas('hr', function($query) use($region){
            $query->whereHas('user', function($query) use($region){
               $query->whereHas('profile', function($query) use($region){
                    $query->where('region','like','%'.$region.'%');
               });
            });
        });
    }

    public function scopeSpecialization($query, $specialization)
    {
        return $query->whereHas('subjects', function ($query) use ($specialization) {
            $query->whereHas('skills', function ($query) use ($specialization) {
                $query->where('name', 'like', '%' . $specialization . '%');
            });
        });
    }

    public function scopeFreeDay($query, $free_day)
    {
        return $query->whereHas('subjects', function ($query) use ($free_day) {
            $query->whereHas('schedules', function ($query) use ($free_day) {
                $query->where('day', 'like', '%' . $free_day . '%');
            });
        });
    }

    public function scopeStartTime($query, $start_time)
    {
        return $query->whereHas('subjects', function ($query) use ($start_time) {
            $query->whereHas('schedules', function ($query) use ($start_time) {
                $query->where('start','>=',$start_time);//->whereTime('end','<=',$end_time);
            });
        });
    }
    public function scopeEndTime($query, $end_time)
    {
        return $query->whereHas('subjects', function ($query) use ($end_time) {
            $query->whereHas('schedules', function ($query) use ($end_time) {
                $query->where('end','<=',$end_time);
            });
        });
    }
    public function scopeTime($query, $start_time, $end_time)
{
    return $query->whereHas('subjects', function ($query) use ($start_time, $end_time) {
        $query->whereHas('schedules', function ($query) use ($start_time, $end_time) {
            $query->where('start','>=',$start_time)->where('end','<=',$end_time);
        });
    });
}


    public function workDays()
    {
        //get all subjects that the job has
        $subjects = $this->subjects;
        //for all the subjects get their schedules and insert them in an array
        $day_values = ['SUN'=>'1','MON'=>'2','TUE'=>'3','WED'=>'4','THU'=>'5','FRI'=>'6','SAT'=>'7'];
        $days = array();
        foreach ($subjects as $subject) {
            foreach ($subject->schedules as $schedule) {
                if (!in_array($schedule->day, $days)) {
                    array_push($days, $schedule->day);
                }
            }
        }
        $day_map = array();
        foreach($days as $day)
        {
            $day_map[$day] = $day_values[$day];
        }
        asort($day_map);

        return implode(" ",array_keys($day_map));

        //return implode(" ", $days);
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
