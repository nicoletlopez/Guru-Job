<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table = 'subejct';
    protected $primaryKey = 'subject_id';
    public $timestamps = false;

    public function hr()
    {
        return $this->belongsTo('App\Hr','hr_id','hr_id');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Skill','job','subject_id','skill_id')
            ->withPivot('job_title','job_type','start_time','end_time','days')
            ->as('job')->using('App\Job');
    }
}
