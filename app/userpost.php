<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userpost extends Model
{
    protected $table="userposts";
    public function category(){
    	return $this->belongsTo('App\Category','idCategory','id');
    }
    public function author(){
    	return $this->belongsTo('App\User','UserId','id');
    }
    
}
