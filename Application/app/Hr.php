<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hr extends Model
{
    //
    protected $table = 'hr';
    protected $primaryKey = 'hr_id';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User','hr_id','user_id');
    }
}
