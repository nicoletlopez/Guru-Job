<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //
    protected $table = 'applicant';
    protected $primaryKey = ['subject_id','skill_id','faculty_id'];
    public $timestamps = true;


}
