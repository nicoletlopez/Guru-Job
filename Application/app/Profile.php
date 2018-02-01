<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profile';
    protected $primaryKey = 'user_id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User','user_id', 'user_id');
    }
}
