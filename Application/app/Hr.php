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
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class,'user_id','user_id');
    }
    public function jobs()
    {
        return $this->hasMany(Job::class,'user_id','user_id');
    }
}
