@extends('layout.parent')
@section('page-title')
	Đăng bài
@endsection
@section('content')

	<script type="text/javascript" src="{{asset('js/jquery.uploadPreview.min.js')}}"></script>
	<script type="text/javascript">
	$(document).ready(function() {
	  $.uploadPreview({
	    input_field: "#image-upload",
	    preview_box: "#image-preview",
	    label_field: "#image-label"
	  });
	});
	</script>
<div style="margin-left: 20px;">
	<h1><b>Đăng ảnh của bạn!!!</b><i class="fa fa-sun" style="color:yellow;"></i></h1>
	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
			    <li>{{$error}}</li>
			    @endforeach
			</ul>
		</div>
	@endif
	@if(session('success'))
                <div class="container-fluid">
                <div class="alert alert-success text-center"" style="width: 100%;">
                  <img src="{{asset('tick.png')}}" width="50px" height="50px" alt="">  {{session('success')}} 
                </div>
                </div>
                <script>
                  setTimeout(()=>{$('.alert-success').slideUp();},3000);
                  
                </script>
    @endif
	<form class="form" method="post" action="{{route('upload.store')}}"  enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="UserId" value="{{Auth::user()->id}}">
		<div class="form-group">
			<label>Tiêu đề</label>
			<input class="form-control" type="text" placeholder="Nhập tiêu đề"  required="required" name="title">
		</div>
		<div class="form-group">
			<label>Ảnh</label>
			<div id="image-preview">
			  <label for="image-upload" id="image-label">Chọn ảnh</label>
			  <input type="file" name="imgInput" id="image-upload" accept="image/*" required="required" />
			</div>
		</div>
		
		<div class="form-group">
			<label>Thể loại</label>
			<select class="form-control" name="CategoryId">
				@foreach($categories as $category)
				<option value="{{$category['id']}}">{{$category['name']}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			 <div class="g-recaptcha" 
                           data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                </div>
		</div>
		<div class="form-group">
			<button class="btn btn-success" type="submit">Đăng</button>
		</div>
	</form>
</div>
@endsection