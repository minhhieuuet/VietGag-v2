@extends('layout.parent')
@section('content')
@foreach($posts as $post)
                <div class="panel panel-default" >
                    <div class="panel-body">
                        <div class="page-header">
                            <h3><a href="{{asset('/post/'.$post['id'])}}" target="_blank"><strong>{{$post['title']}}</strong></a></h3>
                            <p><small> Trong  <a style="color: #e23672;" href="{{asset('/category/'.$post->category['id'])}}" target="_blank">{{$post->category['name']}}</a></small></p>
                            <div class="crop" style="margin-bottom: 10px;">
                            <a href="{{asset('/post/'.$post['id'])}}" target="_blank">
                            <img class="gagimage" data-src="{{asset($post['src'])}}" width="100%">
                            </a>
                            </div>
                            <div>{{$post->comments->count()}} bình luận</div>
                            <!-- <a class="btn btn-default"><i class="fa fa-angle-up"></i></a>
                            <a class="btn btn-default"><i class="fa fa-angle-down"></i></a>
                            <a class="btn btn-default"><i class="fa fa-comment"></i></a>
                            <a class="btn btn-default">°°°</a> -->
                            <div></div>

                            <!-- Upvore down vote -->
                            <div class="fb-like" data-href="{{$post['src']}}" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
                            <div style="float: right;background-color: #3b5998; color: white; padding: 5px 10px 5px 10px;margin-right: 20px;"> <i class="fab fa-facebook-f" style="padding-right: 10px;"></i>  <b>Facebook</b></div>
                            
                        </div>
                    </div>
                </div>
                @endforeach
                

@endsection