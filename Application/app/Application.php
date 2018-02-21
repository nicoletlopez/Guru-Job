<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Application extends Pivot
{
    //
    protected $table = 'application';
    protected $primaryKey = ['user_id','job_id'];
    public $timestamps = 'false';


}
