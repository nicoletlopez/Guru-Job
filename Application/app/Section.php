<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $table = 'section';
    protected $primaryKey = 'id';

    public function resume()
    {
        return $this->belongsTo(Resume::class,'resume_id','id');
    }
}
