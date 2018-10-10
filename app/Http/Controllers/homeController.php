<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\post;
use App\category;
use App\User;
class homeController extends Controller
{
    // Post,register,login,logout for user

    // Hot post
    function index(){
        $posts=post::orderBy('view','DESC')->orderBy('id',"DESC")->paginate(15);
        
        return view('layout.index',compact('posts'));
    }
    // New post
    function new(){
        $posts=post::orderBy('id',"DESC")->paginate(15);
        return view('layout.index',compact('posts'));
    }
    // Post by category
    function category($id){
        $category=category::findOrFail($id);
        
        $posts=$category->post()->orderBy('id',"DESC")->paginate(15);
        return view('layout.category',compact('posts'));
    }
    //Check email exist
    function emailCheck(Request $request){
        $user=User::where('email',$request->email)->select('email')->first();
        return $user;
    }
    function login(){
        return view('layout.login');    
    }
    function logout(){
        Auth::logout();
        return redirect('');
    }
    function loginPost(Request $request){
        $request->validate([
            'email'=>'required',
            'pass'=>'required'
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'pass.required'=>'Bạn chưa nhập mật khẩu'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->pass,'active'=>1])){
            return redirect('hot');
        }
        else {
            return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không đúng');
        }
        
    }
    function register(){
        return view('layout.register');
    }
    function registerPost(Request $request){
        $request->validate([
            'name'=>'required|min:4',
            'email'=>'required|unique:users',
            'pass'=>'required|min:8|max:100',
            'repass'=>'required|min:8|max:100|same:pass',
            'g-recaptcha-response'=>'required'
        ],[
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên phải chứa ít nhất 4 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.unique'=>'Email đã tồn tại',
            'pass.required'=>'Bạn chưa nhập mật khẩu',
            'pass.min'=>'Mật khẩu phải cố dộ dài ít nhất 8 ký tự',
            'repass.same'=>'Nhập lại mật khẩu không khớp',
            'g-recaptcha-response.required'=>'Bạn chưa xác nhận captcha'
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->pass);
        $user->save();
        return redirect('user/login')->with('alert','Đăng ký thành viên thành công!');      
    }
    // Profile
    function userprofile($id){
        $user=User::findorFail($id);
        $posts=post::where('AuthorId',$id)->orderBy('id','DESC')->paginate(10);
        return view('layout.userprofile',compact('user','posts'));
    }
}