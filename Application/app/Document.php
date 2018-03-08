<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $table = 'document';
    protected $primaryKey = 'id';
    public $timestamps = 'true';

    public function documentSpace()
    {
        return $this->belongsTo(DocumentSpace::class,'document_space_id','id');
    }
}
