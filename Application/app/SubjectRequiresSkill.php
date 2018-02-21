<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SubjectRequiresSkill extends Pivot
{
    //
    protected $table = 'subject_requires_skill';
    protected $primaryKey = ['subject_id','skill_id'];
    public $timestamps = false;
}
