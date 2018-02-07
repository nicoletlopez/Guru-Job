<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectRequiresSkill extends Model
{
    //
    protected $table = 'subject_requires_skill';
    protected $primaryKey = ['subject_id','skill_id'];
    public $timestamps = false;
}
