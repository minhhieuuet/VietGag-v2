<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class signupController extends Controller
{
    function signup(Request $request){
    	$user=new User;
    	$user->name=$request->name;
    	$user->password=Hash::make($request->pass);
    	$user->email=$request->email;
    	$user->save();
    	return redirect()->back()->with("success","Đăng ký thành viên thành công");

    }
}
