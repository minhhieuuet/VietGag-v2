@extends('layout.parent')

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
	<form>

		<div class="form-group">
			<label>Tiêu đề</label>
			<input class="form-control" type="text" placeholder="Nhập tiêu đề"  required="required" name="">
		</div>
		<div class="form-group">
			<label>Ảnh</label>
			<div id="image-preview">
			  <label for="image-upload" id="image-label">Chọn ảnh</label>
			  <input type="file" name="image" id="image-upload" />
			</div>
		</div>
		
		<div class="form-group">
			<label>Thể loại</label>
			<select class="form-control">
				@foreach($categories as $category)
				<option>{{$category['name']}}</option>
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