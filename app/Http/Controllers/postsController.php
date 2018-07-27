<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\category;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=post::orderBy('id','DESC')->paginate(10);
        $categories=category::all();
        return view('admin.posts',compact('posts','categories'));
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
        $post=new post;
        $post->title=$request->title;
        $post->idCategory=$request->selectCate;
        if($request->hasFile('imgInput1')){
            if($request->file('imgInput1')->isValid()){
                $file=$request->file('imgInput1');
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
        $post->author=$request->author;
        $post->save();
        return redirect()->back()->with('alert','Thêm bài đăng thành công');
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
        $post=post::findOrFail($id);
        return response($post);
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
        $post=post::findOrFail($request->id);
        $post->title=$request->title;
        $post->idCategory=$request->selectCate;
        $post->author=$request->author;
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
        $post->save();
        return redirect()->back()->with('alert','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=post::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }
}
