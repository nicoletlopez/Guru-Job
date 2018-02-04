<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $table = 'skill';
    protected $primaryKey = 'skill_id';
    public $timestamps = false;

    public function faculties()
    {
        return $this->belongsToMany('App\Faculty','faculty_has_skill','skill_id','faculty_id')
            ->as('faculty_has_skill')->using('App\FacultyHasSkill');
    }
    public function subjects()
    {
        return $this->belongsToMany('App\Subject','job','skill_id','subject_id')
            ->withPivot('job_title','job_type','start_time','end_time','days')
            ->as('job')->using('App\Job');
    }
}
