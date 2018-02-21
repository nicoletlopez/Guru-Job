<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    //
    protected $table = 'faculty';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function status()
    {
        return $this->hasOne('App\Status','user_id','user_id');
    }

    public function certifications()
    {
        return $this->hasMany('App\Certification','user_id','user_id');
    }

    public function resume()
    {
        return $this->hasOne('App\Resume','user_id','user_id');
    }

    public function files()
    {
        return $this->belongsToMany('App\File','faculty_has_file','user_id','file_id')
            ->using('App\FacultyHasFile');
    }

    public function jobs()
    {
        return $this->belongsToMany('App\Job','application','user_id','job_id')
            ->withTimestamps()
            ->using('App\Application');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Skill','faculty_has_skill','user_id','skill_id')
            ->using('App\FacultyHasSkill');
    }

}
