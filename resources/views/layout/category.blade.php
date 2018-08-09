@extends('layout.parent')
@section('page-title')
     Danh mục
@endsection
@section('content')
@foreach($posts as $post)
                <div class="panel panel-default" >
                    <div class="panel-body">
                        <div class="page-header">
                            <h3><a href="{{asset('/post/'.$post['slug']."/".$post['id'])}}" target="_blank"><strong>{{$post['title']}}</strong></a></h3>
                            <p>
                                <small> Trong  <a style="color: #e23672;" target="_blank" href="{{asset('/category/'.$post->category['id'])}}">{{$post->category['name']}}</a>
                                </small>
                                -
                                <small> Đăng bởi <a style="color: #e23672;" target="_blank" href="{{asset('profile/'.$post->author['id'])}}">{{$post->author['name']}}</a>
                                </small>
                                <small>
                                    {{$post->getTimeAgo(Carbon::parse($post->created_at))}}
                                </small>
                            </p>
                            <div class="crop" style="margin-bottom: 10px;">
                            <a href="{{asset('/post/'.$post['slug']."/".$post['id'])}}" target="_blank">
                            <img class="gagimage" data-src="{{asset($post['src'])}}" width="100%">
                            </a>
                            </div>
                            <div>{{$post->comments->count()}} bình luận</div>
                            <!-- <a class="btn btn-default"><i class="fa fa-angle-up"></i></a>
                            <a class="btn btn-default"><i class="fa fa-angle-down"></i></a>
                            <a class="btn btn-default"><i class="fa fa-comment"></i></a>
                            <a class="btn btn-default">°°°</a> -->
                            <div></div>

                            <!-- Upvote down vote -->
                            <div class="fb-like" data-href="{{$post['src']}}" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>

                            <div style="float: right;background-color: #3b5998; color: white; padding: 5px 10px 5px 10px;margin-right: 20px;"> <i class="fab fa-facebook-f" style="padding-right: 10px;"></i>  <b>Facebook</b></div>
                            
                        </div>
                    </div>
                </div>
                @endforeach
                <center>
                <section>
                        <button id="loadmoreBtn" type="button">Xem thêm</button>
                </section>
                </center>

@endsection