<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $table = 'schedule';
    public $timestamps = false;

    public function subject()
    {
        return $this->belongsTo('App\Subject','subject_id','id');
    }
}
