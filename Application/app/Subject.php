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

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class,'subject_requires_specialization','subject_id','specialization_id')->withTimestamps();
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class,'subject_id','id');
    }
}
