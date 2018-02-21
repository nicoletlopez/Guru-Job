<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    //
    protected $table = 'resume';
    protected $primaryKey = 'user_id';

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'user_id','user_id');
    }
}
