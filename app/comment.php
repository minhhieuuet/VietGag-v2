<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table='comments';

    public function user(){
    	return $this->belongsTo('App\User','UserId','id');
    }
    
}
