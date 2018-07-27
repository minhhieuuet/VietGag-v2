<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class adminLoginController extends Controller
{
    function index(){
    	return view('admin.login');
    }
    function authLogin(Request $request){
        $request->validate(['email'=>'required','password'=>'required']);
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->pass])){
    		return redirect("admin");
    	}
    	else{
    		return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không đúng!');
    	}
    	
    }
}
