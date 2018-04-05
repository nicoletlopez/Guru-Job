<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hr extends Model
{
    use Notifiable;
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
        return $this->hasMany(Subject::class, 'hr_id', 'user_id')->orderBy('created_at', 'desc');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'hr_id', 'user_id')->orderBy('created_at', 'desc');
    }

    public function documentSpaces()
    {
        return $this->belongsToMany(DocumentSpace::class, 'hr_has_document_space', 'hr_id',
            'document_id')->withTimestamps();
    }

    public function employees()
    {
        return $this->belongsToMany(Faculty::class, 'employee','hr_id','faculty_id');
    }

    public function is_employee($faculty_id)
    {
        return $this->belongsToMany(Faculty::class, 'employee','hr_id','faculty_id')
            ->wherePivot('faculty_id', $faculty_id);
    }

    /*Search methods*/
    public function scopeSearchHr($query, $search_term)
    {
        return $query->whereHas('user', function ($query) use ($search_term)
        {
            $query->where('name', 'like', '%' . $search_term . '%');
        });
    }

    public function scopeEmployersOf($query, $faculty_id){
        return $query->whereHas('subjects', function ($query) use ($faculty_id){
            $query->where('faculty_id', $faculty_id);
        });
    }
    /*End search methods*/
    public function isAssigned($lecture_id, $hr_id){

        //Checks if a row exists in user_has_lecture table, where hr_id and  lecture_id are the parameters
        $hr = Hr::whereHas('user',function ($hr) use ($hr_id, $lecture_id){
            $hr->whereHas('lectures', function ($hr) use ($hr_id, $lecture_id){
                $hr->where(['user_id'=>$hr_id, 'lecture_id'=>$lecture_id]);
            });
        })->get();

        if(count($hr)>0){
            return true;
        }else{
            return false;
        }
    }
}
