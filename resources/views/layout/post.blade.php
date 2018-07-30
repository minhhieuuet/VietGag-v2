@extends('layout.parent')
@section('page-title')
	{{$post['title']}}
@endsection
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/comment.css')}}">
<div class="panel-body">
	<div class="page-header">
		<div id="menuBar">
			<h3><strong>{{$post['title']}}</strong></h3>
			Lượt xem: <b style="color: red;">{{ Counter::showAndCount($post['id']) }}</b> <i class="fa fa-eye"></i> 
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
			<div>

				 <div style="height: 45px;" class="fb-like" data-href="{{$post['src']}}" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
				

				<div id="nextPost" onclick="goNext()" style="float: right;background-color: #ff3c1f; color: white; padding: 10px 15px 10px 15px;margin:0px 20px 0px 20px;"> <b>Bài tiêp</b><i id='nextBtn' class="fas fa-angle-right fa-lg" style="padding-left: 10px;"></i> </div>
			</div>

		</div>

		<div class="crop" style="margin-bottom: 10px;">
			<img class="gagimage" width="100%" src="{{asset($post['src'])}}" style="">
		</div>
		<div class="share">
			<ul>
				<li style="background-color: #36528c;margin-right: 10px;"><i class="fab fa-facebook-f"><a style="color: white;" href="javascript:" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + window.location);" target="_blank"></i> Chia sẻ trên Facebook</a></li>
				<li style="background-color: #ad071a;"><i class="fab fa-pinterest"></i> Chia sẻ trên Pinterest</li>

			</ul>
		</div>

	</div>

	<div class="CS3">

		<div class="tab-bar clearfix">

			<div class="tab-bar-left">
				<h3>{{$post->comments->count()}} Comments</h3>
			</div>
			<div class="tab-bar-right">
				<ul class="tab">
					<li class="active"><a href="#">Bình luận</a></li>
				<!-- 	<li class=""><a href="#">Fresh</a></li> -->
				</ul>

			</div>
		</div>
		<div class="comment-embed">
			<!---->
			<div>
				<!---->
				<!---->
				<!---->
				<!---->
			</div>
			<div class="comment-box first">
					@if(Auth::check())
				<div class="avatar">
					<div class="image-container"><a href="javascript:void(0)" target="_blank"><img src="{{asset(Auth::user()->avatar)}}"></a></div>
				</div>
				
			
				<div class="payload" >
					<!---->
					<form method="post" action="{{route('comment.store')}}">
					@csrf
					<div class="textarea-container">
						<input type="hidden" name="UserId" value="{{Auth::user()->id}}">	
						<input type="hidden" name="PostId" value="{{$post['id']}}">
						<div><textarea id='comment-area' name="content" placeholder="Viết bình luận" class="post-text-area focus"></textarea>
							<!---->
						</div>
					</div>
					<!---->
					<div class="action">
					
						<div class="rhs">

							<p class="word-count" id="word-count">Tối đa:<span>500</span></p> 
							<button  class="btn btn-success" type="submit" style="margin-left:20px;border-radius: 3px;background-color: #09f;">Đăng</button>
						</div>
						</div>
						</form>
						@if ($errors->any())
				    				Lỗi:
				        <ul style="color: red;">
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    
						@endif
						<!---->
					</div>
					@else
					<div class="notice-message">
        <p class="align-center">Vui lòng đăng nhập để bình luận!</p>
        <div class="btn-container align-center"><a href="{{asset('user/login')}}" target="_blank" class="btn">Đăng nhập ngay</a></div>
     </div>
					@endif
					
					<div class="clearfix"></div>
				</div>
				<div>
	

       @if($post->comments->count()>0)
       @foreach($comments as $comment)
       <div>
       	<div class="comment-entry">
       		<div class="avatar">
       			<div class="image-container"><a href="#" target="_blank"><img src="{{asset($comment->user['avatar'])}}"></a></div>
       		</div>
       		<div class="payload">
       			<div class="info">
       				<p><a href="#" target="_blank" class="username">{{$comment->user['name']}}</a>
       					<!---->
       					<!----><span class="meta"><!----> <span><span class="points">{{$comment->created_at}}</span> <span> · </span></span>
       				</p>
       			</div>
       			<div class="content">{{$comment['content']}}</div>
       			<!---->
       			<div><i class="fa fa-like"></i></div>
       			<div class="action"><span><a class="reply">Trả lời</a></span>

       				<!---->
       				<!---->
       			</div>
       		</div>
       		<div class="extra-menu"><a href="#" class="menu-trigger"><span class="drop"></span></a>
       			<div class="comment-pop-menu hide">
       			
       			</div>
       		</div>
       		<div class="clearfix"></div>
       	</div>
       	<div>
       		<!---->
       	</div>
       
       	
       	<!---->
       </div>
       @endforeach
       @else
       <div class="notice-message" style="margin-left: 0px;">
        <p class="align-center">Hãy trở thành người đầu tiên bình luận bài viết này!</p>
        
       </div>
       @endif
       <!---->
       <!---->
      </div>
     </div>
    </div>
   </div>
   <script>
   	$('#comment-area').keydown(function(){
   			
   			var count=500-$('#comment-area').val().length;
   			if(count>=0){
   					$('#word-count>span').html(count);
   			}
   			else{
   					$('#word-count>span').html("<b style='color:red;	'>Đã quá số kí tự cho phép</b>");
   			}
   	})
   </script>
   @endsection