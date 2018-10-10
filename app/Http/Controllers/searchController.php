<?php

namespace App\Http\Controllers;
use App\post;
use Illuminate\Http\Request;

class searchController extends Controller
{
    function index(){
    	$query=\Request::get('query');
    	$posts=post::where('title','like','%'.$query.'%')->orderBy('id','DESC')->get();
    	return view('layout.search',compact('posts'));
    }
}
