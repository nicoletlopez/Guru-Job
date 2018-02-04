<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profile';
    protected $primaryKey = 'user_id';
    public $timestamps = true;

    public function faculty()
    {
        return $this->belongsTo('App\Faculty','faculty_id', 'faculty_id');
    }
}
