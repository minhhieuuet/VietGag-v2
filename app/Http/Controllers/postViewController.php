<?php

namespace App\Http\Controllers;
use App\category;
use App\post;
use App\comment;
use Counter;
use Illuminate\Http\Request;
use App\Events\Event;
class postViewController extends Controller
{
    function indexSlug($slug,$id){
    	$categories=category::all();
    	$post=post::findOrFail($id);
        $post->view=Counter::show($post['id']);
        $post->save();

    	$comments=comment::where('PostId',$id)->orderBy('id','DESC')->get();


    	return view('layout.post',compact('categories','post','comments'));
    }
    function index($id){
        $categories=category::all();
        $post=post::findOrFail($id);
        $post->view=Counter::show($post['id']);
        $post->save();

        $comments=comment::where('PostId',$id)->orderBy('id','DESC')->get();


        return view('layout.post',compact('categories','post','comments'));
    }
    function getPrev($id){
    	$prev=post::orderBy('id','DESC')->where('id','<',$id)->first();
    	return response($prev);
    }
}
