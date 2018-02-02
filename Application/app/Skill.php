<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $table = 'skill';
    protected $primaryKey = 'skill_id';
    public $timestamps = false;

    public function faculties()
    {
        return $this->belongsToMany('App\Faculty')->as('faculty_has_skill');
    }
}
