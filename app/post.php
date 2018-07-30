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

    public function author(){
    	return $this->belongsTo('App\User','AuthorId','id');
    }


    public function getTimeAgo($carbonObject) {
        return str_ireplace(
            [' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks', ' week'], 
            ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'], 
            $carbonObject->diffForHumans(null, true)." trước"
        );
    } 
    
}
