<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $table = 'skill';

    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'subject_requires_skill','skill_id','subject_id');
    }
}
