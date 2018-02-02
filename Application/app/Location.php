<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'location';
    protected $primaryKey = 'location_id';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User','user_id','user_id');
    }
}
