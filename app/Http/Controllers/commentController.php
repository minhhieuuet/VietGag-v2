<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;   
use Illuminate\Http\Request;
use App\comment;
use App\User;
use App\post;
use App\Notifications\UserNotification;
class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \I=>lluminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'=>'required|max:500|min:3',

        ],[
            'content.required'=>'Bạn phải nhập nội dung',
            'content.min'=>'Nội dung phải nhiều hơn 3 ký tự',
            'content.max'=>'Nội dung không được quá 500 ký tự'
        ]);
        $comment=new comment;
        $comment->content=$request->content;
        $comment->UserId=$request->UserId;
        $comment->PostId=$request->PostId;
        $comment->save();

        $authorId=post::findorFail($request->PostId)->author['id'];
        $userName=User::find($request->UserId)->name;
        if(Auth::user()->id!=$authorId){
            // Make json agrument
            $json=array('href'=>"post/".$request->PostId,'content'=>$userName.' vừa bình luận bài viết "'.post::findorFail($request->PostId)->title.'" của bạn');
            
            User::find($authorId)->notify(new UserNotification(json_encode($json)));
        }
        
         return redirect()->back();
        
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
