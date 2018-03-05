<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $table = 'document';
    protected $primaryKey = 'id';
    public $timestamps = 'true';

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'user_id','user_id');
    }

    public function hrs()
    {
        return $this->belongsToMany(Hr::class,'hr_has_document',
            'document_id','user_id')->withTimestamps();
    }
}
