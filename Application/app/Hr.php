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
        return $this->belongsTo('App\User','user_id','id');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject','user_id','user_id');
    }
}
