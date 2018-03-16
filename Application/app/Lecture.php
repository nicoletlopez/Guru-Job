<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    //
    protected $table = 'lecture';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function viewers()
    {
        return $this->belongsToMany(Faculty::class,'faculty_has_lecture','lecture_id','user_id')
            ->withTimestamps();
    }

    public function files()
    {
        return $this->hasMany(File::Class,'lecture_id','id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','faculty_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_has_lecture','lecture_id','user_id')->withTimestamps();
    }
}
