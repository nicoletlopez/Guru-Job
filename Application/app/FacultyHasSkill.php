<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyHasSkill extends Model
{
    //
    protected $table = 'faculty_has_skill';
    protected $primaryKey = ['user_id','skill_id'];
}
