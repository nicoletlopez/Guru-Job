<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    //
    protected $table = 'resume';
    protected $primaryKey = 'id';

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','user_id');
    }

    public function sections(){
        return $this->hasMany(Section::class, 'resume_id','id');
    }
}
