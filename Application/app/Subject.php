<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table = 'subject';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function hr()
    {
        return $this->belongsTo(Hr::class,'user_id','user_id');
    }

    public function job()
    {
        return $this->hasOne(Job::class,'subject_id','id');
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class,'subject_requires_specialization','subject_id','specialization_id')->withTimestamps();
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class,'subject_id','id');
    }

    public function faculties()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','user_id');
    }
}
