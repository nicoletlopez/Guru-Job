<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    //
    protected $table = 'faculty';
    protected $primaryKey = 'faculty_id';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User','faculty_id','user_id');
    }

    public function status()
    {
        return $this->hasOne('App\Status','faculty_id','faculty_id');
    }

    public function contact()
    {
        return $this->hasOne('App\Contact','faculty_id','faculty_id');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Faculty','faculty_has_skill','faculty_id','skill_id')
            ->as('faculty_has_skill')->using('App\FacultyHasSkill');
    }

    public function job()
    {
        return $this->hasMany('App\Job','faculty_id','faculty_id');
    }

    public function files()
    {
        return $this->belongsToMany('App\File', 'faculty_has_file','faculty_id', 'file_id')
            ->withPivot('file_name')->withTimestamps()
            ->as('faculty_has_file')->using('App\FacultyHasFile');
    }
}
