@extends('layout.parent')
@section('page-title')
	{{$user['name']}} - Vietgag	
@endsection
@section('content')
<div class="profile">
	<section class="profile-header">
		<div class="img-container round"><img src="{{asset($user['avatar'])}}" alt="Profile Pic"></div>
	</section>
	<header>
		<h2>{{$user['name']}}</h2>
		<p>" hihi i am admin "</p>
	</header>
	<div class="clearfix"></div>
</div>
<div class="tabbar">
	<div class="tab-bar-title">
		<i class="far fa-paper-plane"></i> BÀI ĐĂNG
	</div>
</div>
@foreach($posts as $post)
                <div class="panel panel-default" >
                    <div class="panel-body">
                        <div class="page-header">
                            <h3><a href="{{asset('/post/'.$post['id'])}}" target="_blank"><strong>{{$post['title']}}</strong></a></h3>
                            {{-- Category,Author --}}
                            <p>
                                <small> Trong  <a style="color: #e23672;" target="_blank" href="{{asset('/category/'.$post->category['id'])}}">{{$post->category['name']}}</a>
                                </small>
                                -
                                <small> Đăng bởi <a style="color: #e23672;" target="_blank" href="">{{$post->author['name']}}</a>
                                </small>
                                
                                <small>
                                    {{$post->getTimeAgo(Carbon::parse($post->created_at))}}
                                </small>
                            </p>
                            {{-- Content --}}
                            <p></p>
                            <div class="crop" style="margin-bottom: 10px;">
                            <a  href="{{asset('/post/'.$post['id'])}}" target="_blank">
                            <img class="gagimage" data-src="{{asset($post['src'])}}" width="100%">
                            </a>
                            </div>
                            <!-- Info comment, seen -->
                            <div style="color: #999;">{{$post->comments->count()}} bình luận - {{ Counter::show($post['id']) }} lượt xem</div>
                            <div></div>

                            <!-- Upvore down vote -->
                            <div class="fb-like" data-href="{{$post['src']}}" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>

                            <div style="float: right;background-color: #3b5998; color: white; padding: 5px 10px 5px 10px;margin-right: 20px;"> <i class="fab fa-facebook-f" style="padding-right: 10px;"></i>  <b>Facebook</b></div>
                            
                        </div>
                        
                    </div>
                </div>
                @endforeach
                <center>
                	{{$posts->links()}}
                </center>
@endsection