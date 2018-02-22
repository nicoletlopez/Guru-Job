<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    //
    protected $table = 'lecture';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
