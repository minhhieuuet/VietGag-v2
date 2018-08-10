<?php

namespace App\Http\Controllers;
use App\userpost;
use App\post;
use Carbon\Carbon;
use App\User;
use App\category;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    function index(){
    	$postcount=post::all()->count();
    	$newPostCount=post::whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-7 days')) )->count();


    	$notApprovedPostCount=userpost::where('approved',0)->whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-7 days')) )->count();


    	$approvePostCount=userpost::where('approved',0)->get()->count();

    	$userCount=User::where('role',5)->count();

    	$newUserCount=User::where('role',5)-> whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-7 days')) )->count();
    	// Chart
    	$categoriesName=category::select('name')->get();

        $postCountArr=[];
        for($i=0;$i<7;$i++)
        {
            $date=Carbon::now()->subDays($i)->toDateString();
            $count=post::whereDate('created_at','=',$date)->count();
            

            array_push($postCountArr,$count);
        }



    	return view('admin.dashboard',compact('postcount','notApprovedPostCount','approvePostCount','userCount','newUserCount','newPostCount','categoriesName','postCountArr'));
    }
}
