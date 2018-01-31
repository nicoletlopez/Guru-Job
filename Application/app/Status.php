<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = 'status';
    protected $primaryKey = 'status_id';
    public $timestamps = false;

    public function faculty()
    {
        $this->belongsTo('App\Faculty');
    }

}
