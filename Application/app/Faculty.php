<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    //
    protected $table = 'faculty';
    protected $primaryKey = 'faculty_id';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User','faculty_id','user_id');
    }

    public function status()
    {
        return $this->hasOne('App\Status','faculty_id','faculty_id');
    }
}
