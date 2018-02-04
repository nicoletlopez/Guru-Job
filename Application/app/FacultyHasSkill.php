<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FacultyHasSkill extends Pivot
{
    protected $primaryKey = ['faculty_id','skill_id'];
    protected $table = 'faculty_has_skill';
    public $timestamps = false;
}