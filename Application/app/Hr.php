<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hr extends Model
{
    //
    protected $table = 'hr';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'user_id', 'user_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'user_id', 'user_id')->orderBy('created_at','desc');
    }

    public function documentSpaces()
    {
        return $this->belongsToMany(DocumentSpace::class, 'hr_has_document_space', 'user_id',
            'document_id')->withTimestamps();
    }

    public function employees()
    {
        return $this->belongsToMany(Faculty::class, 'employee', 'hr_id', 'faculty_id')->withTimestamps();
    }

    /*Search methods*/
    public function scopeSearchHr($query, $search_term)
    {
        return $query->whereHas('user', function ($query) use ($search_term)
        {
            $query->where('name', 'like', '%' . $search_term . '%');
        });
    }
    /*End search methods*/
}
