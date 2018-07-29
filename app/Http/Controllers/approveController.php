<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userpost;
use App\post;
class approveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=userpost::orderBy('id','DESC')->paginate(10);
        return view('admin.approve',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $post=userpost::findorFail($id);
        $name=$post->title;
        $post->delete();
        return redirect()->back()->with('alert','Đã xóa bài đăng '.$name);
    }
    // Add user post to new page
    public function accept($id)
    {   
        $userpost=userpost::findorFail($id);
        $userpost->approved=1;
        $userpost->save();

        $post=new post;

        $post->title=$userpost->title;
        $name=$userpost->title;
        $post->src=$userpost->src;
        $post->idCategory=$userpost->idCategory;
        $post->author=$userpost->author['name'];
        $post->save();
        return redirect()->back()->with('alert','Đã duyệt bài viết '.$name);
    }
   
}
