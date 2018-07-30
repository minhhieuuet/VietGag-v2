<?php

namespace App\Http\Controllers;
use App\category;
use App\post;
use App\comment;
use Illuminate\Http\Request;
use App\Events\Event;
class postViewController extends Controller
{
    function index($id){
    	$categories=category::all();
    	$post=post::findOrFail($id);
    	$comments=comment::where('PostId',$id)->orderBy('id','DESC')->get();

        $post->increment('view');

    	return view('layout.post',compact('categories','post','comments'));
    }
    function getPrev($id){
    	$prev=post::orderBy('id','DESC')->where('id','<',$id)->first();
    	return response($prev);
    }
}
