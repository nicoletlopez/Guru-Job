<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyHasFile extends Model
{
    //
    protected $table = 'faculty_has_file';
    protected $primaryKey = ['file_id','faculty_id'];
    public $timestamps = true;
}
