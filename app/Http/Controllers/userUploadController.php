<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\userpost;
use App\Notifications\UserNotification;
class userUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('layout.upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|min:3|max:50',
            'g-recaptcha-response'=>'required',
            'imgInput'=>'required|mimes:jpg,jpeg,png'
        ],[
            'g-recaptcha-response.required'=>'Bạn chưa xác nhận captcha',
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'title.max'=>'Tiêu đề chứa tối đa 50 ký tự'
        ]);
        $post=new userpost;
        if($request->hasFile('imgInput')){
            if($request->file('imgInput')->isValid()){
                $file=$request->file('imgInput');
                $name=$file->getClientOriginalName();
                $Hinh=str_random(5)."-".$name;
                while(file_exists("image/".$Hinh))
                {
                    $Hinh=str_random(5)."-".$name;
                    
                }
                $file->move('image',$Hinh);
                $post->src="image/".$Hinh;  
            }
        }
        else{
                $post->src='';
        }

        $post->title=$request->title;
        $post->idCategory=$request->CategoryId;
        $post->UserId=$request->UserId;
        $post->save();
        // Notification to admin
        User::find(1)->notify(new UserNotification(User::find($request->UserId)->name.' vừa đăng bài "'.$request->title.'"'));

        return redirect()->back()->with('success','Đăng bài thành công! Bài đăng của bạn đang được kiểm duyệt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
