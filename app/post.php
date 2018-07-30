<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table="posts";
    public function category(){
    	return $this->belongsTo('App\category','idCategory','id');
    }

    public function comments(){
    	return $this->hasMany('App\comment','PostId','id');
    }

    function author(){
    	return $this->belongsTo('App\User','AuthorId','id');
    }
    
}
