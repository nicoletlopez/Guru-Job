<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

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
        return $this->hasOne('App\Profile','user_id','user_id');
    }

    public function hr()
    {
        return $this->hasOne('App\Hr','hr_id','user_id');
    }

    public function faculty()
    {
        return $this->hasOne('App\Faculty','faculty_id','user_id');
    }

    public function location()
    {
        return $this->hasOne('App\Location','user_id','user_id');
    }
}
