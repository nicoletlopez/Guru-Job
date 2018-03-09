<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $primaryKey = 'id';
    public $timestamps = 'true';

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function scopeJobSchedule($query, $id)
    {
        return $query->whereHas('subject', function ($query) use ($id) {
            $query->whereHas('job', function ($query) use ($id) {
                $query->where('id', '=', $id);
            });
        });
    }
}
