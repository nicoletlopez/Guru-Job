<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = 'job';
    public $timestamps = false;

    public function subjects()
    {
        return $this->hasMany('App\Subject','subject_id','id');
    }

    public function hr()
    {
        return $this->belongsTo('App\Hr','user_id','user_id');
    }

    public function faculties()
    {
        return $this->belongsToMany('App\Faculty','application','job_id','user_id')
            ->withPivot('applied_at')
            ->using('App\Application');
    }
}
