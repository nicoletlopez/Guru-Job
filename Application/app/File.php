<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table = 'file';
    protected $primaryKey = 'id';
    public $timestamps = 'true';

    public function lecture()
    {
        return $this->belongsTo(Lecture::class,'lecture_id','id');
    }
}
