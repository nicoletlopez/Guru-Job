<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'contact';
    protected $primaryKey = 'contact_id';
    public $timestamps = true;

    public function faculty()
    {
        return $this->belongsTo('App\Faculty','faculty_id','faculty_id');
    }
}
