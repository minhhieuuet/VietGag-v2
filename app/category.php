<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table="categories";
    public function post(){
    	return $this->hasMany('App\post','idCategory','id');
    }	
}
