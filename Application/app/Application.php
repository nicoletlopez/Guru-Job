<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $table = 'application';
    protected $primaryKey = ['user_id','job_id'];
    public $timestamps = 'false';


}
