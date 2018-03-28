<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class,'user_id','id');
    }

    public function hr()
    {
        return $this->hasOne(Hr::class,'user_id','id');
    }

    public function faculty()
    {
        return $this->hasOne(Faculty::class,'user_id','id');
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class,'user_has_lecture','user_id','lecture_id')->withTimestamps();
    }
}
