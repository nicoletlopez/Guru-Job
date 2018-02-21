<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FacultyHasSkill extends Pivot
{
    //
    protected $table = 'faculty_has_skill';
    protected $primaryKey = ['user_id','skill_id'];
}
