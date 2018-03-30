<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentSpace extends Model
{
    //
    protected $table = 'document_space';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function documents()
    {
        return $this->hasMany(Document::class,'document_space_id','id');
    }

    public function hrs()
    {
        return $this->belongsToMany(Hr::class,'hr_has_document_space','document_space_id','user_id')
            ->withTimestamps();
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','user_id');
    }
}
