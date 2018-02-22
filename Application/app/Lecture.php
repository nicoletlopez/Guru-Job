<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    //
    protected $table = 'lecture';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function owners()
    {
        return $this->belongsToMany(Faculty::class,'faculty_has_lecture','lecture_id','user_id');
    }
}
