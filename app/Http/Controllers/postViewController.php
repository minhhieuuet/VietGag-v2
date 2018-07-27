<?php

namespace App\Http\Controllers;
use App\category;
use App\post;
use Illuminate\Http\Request;

class postViewController extends Controller
{
    function index($id){
    	$categories=category::all();
    	$post=post::findOrFail($id);
    	return view('layout.post',compact('categories','post'));
    }
    function getPrev($id){
    	$prev=post::orderBy('id','DESC')->where('id','<',$id)->first();
    	return response($prev);
    }
}
