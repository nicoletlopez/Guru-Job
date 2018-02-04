<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table = 'file';
    protected $primaryKey = 'file_id';
    public $timestamps = true;

    public function faculties()
    {
        return $this->belongsToMany('App\Faculty','faculty_has_file','file_id','faculty_id')
            ->withPivot('file_name')->withTimestamps()
            ->as('faculty_has_file')->using('App\FacultyHasFile');
    }
}
