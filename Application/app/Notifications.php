<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    //
    protected $table = 'notifications';
    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class,'notifiable_id','id');
    }
}
