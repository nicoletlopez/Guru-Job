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
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /*public function status()
    {
        return $this->hasOne(Status::class,'user_id','user_id');
    }*/

    /*public function certifications()
    {
        return $this->hasMany('App\Certification','user_id','user_id');
    }*/

    public function resumes()
    {
        return $this->hasMany(Resume::class, 'faculty_id', 'user_id');
    }


    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'application', 'user_id', 'job_id')
            ->withTimestamps();
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'faculty_has_skill', 'user_id', 'skill_id');
    }

    //only the lectures that this certain faculty owns
    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'faculty_id', 'user_id')->orderBy('created_at', 'desc');
    }

    public function documentSpaces()
    {
        return $this->hasMany(DocumentSpace::class, 'user_id', 'user_id')->orderBy('created_at', 'desc');
    }

    public function employers()
    {
        return $this->belongsToMany(Hr::class, 'employee', 'faculty_id', 'hr_id')->withTimestamps();
    }

    /*search methods*/
    public function scopeName($query, $search_term)
    {
        return $query->whereHas('user', function ($query) use ($search_term)
        {
            $query->where('name', 'like', '%' . $search_term . '%');
        });
    }

    public function scopeSkill($query, $search_term)
    {
        return $query->whereHas('skills', function ($query) use ($search_term)
        {
            $query->where('name', 'like', '%' . $search_term . '%')
                ->orWhere('desc', 'like', '%' . $search_term . '%');
        });
    }

    public function scopeCity($query, $search_term)
    {
        return $query->whereHas('user', function ($query) use ($search_term)
        {
            $query->whereHas('profile', function ($query) use ($search_term)
            {
                $query->where('city', 'like', '%' . $search_term . '%');
            });
        });
    }

    public function scopeAddress($query, $search_term)
    {
        return $query->whereHas('user', function ($query) use ($search_term)
        {
            $query->whereHas('profile', function ($query) use ($search_term)
            {
                $query->where('street_address', 'like', '%' . $search_term . '%');
            });
        });
    }
    /*end search methods*/
}
