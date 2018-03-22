<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    //
    protected $table = 'specialization';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'subject_requires_skill','skill_id','subject_id');
    }
}
?>