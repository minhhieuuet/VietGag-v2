@extends('layout.parent')
@section('page-title')
    Đăng ký
@endsection
@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
	<div id="registerForm">
                @if(session('alert'))
                <div class="container-fluid">
                <div class="alert alert-success text-center"" style="width: 100%;">
                  <img src="{{asset('tick.png')}}" width="50px" height="50px" alt="">  {{session('alert')}} 
                </div>
                </div>
                <script>
                  setTimeout(()=>{$('.alert-success').slideUp();},3000);
                  
                </script>
                @endif
                <h1><b>Trở thành thành viên!</b></h1>
                <form method="POST" action="{{route('register')}}">
                @csrf
                <div class="form-group">
                    <label>Tên đầy đủ</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group" >
                    <label>Email</label><div id="inputEmail"></div>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" name="pass">
                </div>
               <div class="g-recaptcha" 
                           data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                </div>
                <br>
                <div class="form-group">
                   
                   <button class="btn btn-info" type="submit" style="border-radius: 0px;background-color: #09f;">Đăng ký</button>
                </div>
                </form>
    </div>
     <script>
         $('#email').keydown(function(){
            clearTimeout(timeout);
            var timeout=setTimeout(function(){
                $.ajax({
                url:window.location.origin+"/checkemail",
                type:'post',
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  
                },
                data:{
                    email:$('#email').val()}
                ,success:function(data){
                        var pattern = new RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                        if(data.email!=undefined||!pattern.test($('#email').val()))
                        {
                            $('#inputEmail').html("<i style='color:red;' class='fas fa-exclamation-triangle'> Email đã tồn tại hoặc sai định dạng</i>");
                        }
                        else
                        {
                            $('#inputEmail').html("<i style='color:green;' class='fas fa-check'> Bạn có thể sử dụng email này</i>");
                        }
                        
                        
                    
                }
            });

            },500);
            
         });
     </script>
@endsection