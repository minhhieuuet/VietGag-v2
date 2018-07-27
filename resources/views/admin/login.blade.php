<!DOCTYPE html>
<html>
<head>
	<title>VietgagAdmin- Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="{{asset('adminlayout/css/login.css')}}">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
     <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>	
</head>
<body>
	<div class="materialContainer">


   <div class="box">
    @if(session('error'))
      <div id="alertError" style="display: none;">
        <i class="fas fa-times-circle"></i> {{session('error')}}
      </div>
      <script>
        $('#alertError').slideDown();
        setTimeout(()=>{$('#alertError').slideUp()},1500);
      </script>
    @endif
      <div class="title">VIETGAG <i class="fas fa-sun" style="color: #f4f142;"></i></div>
      
      <form method="POST" action="{{action('adminLoginController@authLogin')}}">
        @csrf

      <div class="input">
         <label for="name">Email</label>
         <input name="email" type="email"  id="name" required="required">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="pass">Mật khẩu</label>
         <input type="password" name="pass" id="pass" required="required">
         <span class="spin"></span>
      </div>
      
      <div class="button login">
         <button type="submit"><span>Đăng nhập</span> <i class="fa fa-check"></i></button>
      </div>
      </form>
      <a href="" class="pass-forgot">Quên mật khẩu?</a>

   </div>

   <div class="overbox">
      <div class="material-button alt-2"><span class="shape"></span></div>

      <div class="title">LIÊN HỆ HỖ TRỢ</div>
      <div class="input">
      	<label><b>Email:</b> minhhieuuet@gmail.com</label>
      </div>
     <!--  <div class="input">
         <label for="regname">Username</label>
         <input type="text" name="regname" id="regname">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="regpass">Password</label>
         <input type="password" name="regpass" id="regpass">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="reregpass">Repeat Password</label>
         <input type="password" name="reregpass" id="reregpass">
         <span class="spin"></span>
      </div>

      <div class="button">
         <button><span>NEXT</span></button>
      </div> -->


   </div>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
   <script type="text/javascript" src="{{asset('adminlayout/js/login.js')}}"></script>

</div>
</body>
</html>