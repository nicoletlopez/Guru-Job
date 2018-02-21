<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profile';
    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
