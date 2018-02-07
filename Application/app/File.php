<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table = 'file';

    public function faculties()
    {
        return $this->belongsToMany('App\Faculty','faculty_has_file','file_id','user_id')
            ->as('faculty_has_file')
            ->using('App\Faculty_has_file');
    }
}
