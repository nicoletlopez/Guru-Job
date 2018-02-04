<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = 'job';
    protected $primaryKey = ['subject_id','skill_id','faculty_id'];
    public $timestamps = false;

    public function faculty()
    {
        return $this->belongsTo('App\Faculty','faculty_id','faculty_id');
    }
}
