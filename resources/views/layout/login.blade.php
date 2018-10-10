@extends('layout.parent')
@section('page-title')
    Đăng nhập
@endsection
@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
            {{session('error')}}    
        
    </div>
    @endif
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
	
        <form method="POST" action="{{route('loginPost')}}">
            @csrf
            <div>
                <p style="color:#999">Đăng nhập với email</p>
            </div>
            <div class="form-group" >
                <label>Email </label><div id="inputEmail"></div>
                <input type="email" class="form-control" name="email" placeholder="Nhập email" id="email">

            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" name="pass" placeholder="Nhập mật khẩu">
            </div>
            <div class="form-group">
                
               <button  class="btn btn-info" type="submit" style="border-radius: 0px;background-color: #09f;">Đăng nhập</button>
            </div>
        </form>
       
    
@endsection