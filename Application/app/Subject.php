<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table = 'subejct';
    protected $primaryKey = 'subject_id';
    public $timestamps = false;

    public function hr()
    {
        return $this->belongsTo('App\Hr','hr_id','hr_id');
    }
}
