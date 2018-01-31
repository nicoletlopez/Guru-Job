<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profile';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
