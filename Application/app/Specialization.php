<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;

class Specialization extends Model
{
    //
    protected $table = 'specialization';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'subject_has_specialization','specialization_id','subject_id')->withTimestamps();
    }

    public function faculty()
    {
        return $this->belongsToMany(Faculty::class,'faculty_has_specialization','specialization_id','faculty_id');
    }
}
?>