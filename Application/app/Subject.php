<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table = 'subject';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function hr()
    {
        return $this->belongsTo(Hr::class,'user_id','user_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class,'job_id','id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class,'subject_requires_skill','subject_id','skill_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class,'subject_id','id');
    }
}
