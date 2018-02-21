<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FacultyHasFile extends Pivot
{
    //
    protected $table = 'faculty_has_file';
    protected $primaryKey = ['file_id','user_id'];
}
