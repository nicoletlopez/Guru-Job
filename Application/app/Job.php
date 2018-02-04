<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = 'job';
    protected $primaryKey = ['subject_id','skill_id','faculty_id'];
    public $timestamps = false;
}
