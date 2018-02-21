<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table = 'file';

    public function faculties()
    {
        return $this->belongsToMany(Faculty::class,'faculty_has_file','file_id','user_id');
    }
}
