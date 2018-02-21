<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
class Faculty extends Model
{
    //
    protected $table = 'faculty';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /*public function status()
    {
        return $this->hasOne(Status::class,'user_id','user_id');
    }*/

    public function certifications()
    {
        return $this->hasMany('App\Certification','user_id','user_id');
    }

    public function resume()
    {
        return $this->hasOne(Resume::class,'user_id','user_id');
    }

    public function files()
    {
        return $this->belongsToMany(File::class,'faculty_has_file','user_id','file_id');
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class,'application','user_id','job_id')
            ->withTimestamps();
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class,'faculty_has_skill','user_id','skill_id');
    }

}
