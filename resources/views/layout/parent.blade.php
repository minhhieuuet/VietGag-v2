<!DOCTYPE html>
<html>
<head>
    <title> @yield('page-title') </title>
    <meta charset=utf-8>
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Knewave" rel="stylesheet">
    <link rel="shortcut icon" href="/logo.png" type="image/x-icon">
    <link rel="icon" href="/logo.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="{{asset('js/jquery.lazy.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/9gag.js')}}"></script>
    <link rel="stylesheet" href="//brick.a.ssl.fastly.net/Roboto:400"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
	<script>
		$(document).ready(()=>{
			$(function() {
	        $('img').Lazy({
        // your configuration goes here
	        scrollDirection: 'vertical',
	        effect: 'fadeIn',
	        visibleOnly: true,
	        onError: function(element) {
	            console.log('error loading ' + element.data('src'));
	        }
	    });
	    });
        
		})
        function markReadNoti(){
            $.get(window.location.origin+'/markAsReadNotification');
            $('#unread-noti-count').html(0);
        }
		
	</script>
    <!-- Navbar -->
    <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <!-- <div class="container-fluid" id="alertSuccess">
        Thành công
        </div> -->
        <div class="container">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
            <a href="{{asset('')}}" id="logo" class="navbar-brand" style="font-size: 30px;color: white;font-family: 'Knewave', cursive;
">Vietgag</a>
            </div>
            
            
            <div class="collapse navbar-collapse navHeaderCollapse"  id="myNavbar">
                <ul class="nav navbar-nav vision-sm vision-xs hidden-lg hidden-md">
                    <li><a href="{{asset('register')}}"><i class="fas fa-user-edit"></i>

 Đăng ký</a></li>
                    <li><a href="{{asset('user/login')}}"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>
                    <hr>
                    <li><a href="{{asset('hot')}}"><i class="fas fa-fire" style="color: red"></i> Đang hot</a></li>
                    <li> <a href="{{asset('new')}}"><i class="fas fa-bolt" style="color: yellow;"></i> Mới</a></li>
                    @foreach($categories as $category )
                    <li><a href="{{asset('category/'.$category['id'])}}"><i class="{{$category['icon']}}"></i> {{$category['name']}}</a></li>
                    @endforeach
                    <p>Vietgag</p>
                </ul>
                <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm" >
                    {{-- Search --}}
                    <li >
                        <a id='searchIcon'> <i class="fa fa-search"></i></a>
                        <form method="GET" action="{{asset('search')}}">
                        <input id='searchText' style="display:none;position:absolute;margin-left: -30px;width: 150px; box-shadow: 0px 2px 2px 0px #ccc;" type="text" name="query" placeholder="Tìm kiếm...">
                        </form>
                    </li>
                    
                    {{-- Homepage --}}
                    <li><a href="{{asset('')}}">Trang chủ</a></li>
                    @if(Auth::check())

                    <li ><a style="background-color: #09f;color: white;font-weight: " href="{{asset('upload')}}"><i class="fa fa-plus"></i> Đăng ảnh</a></li>
                    {{-- Notification --}}
                    {{-- <li><a style="color: white;" href=""><i class="fas fa-bell"></i></a></li> --}}
                    <li class="dropdown" onclick="markReadNoti()">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            @if(Auth::user()->unreadnotifications->count()==0)
                            <i style="font-size: 20px;" class="fa fa-bell"></i>
                            @else
                            <i style="font-size: 20px;color: white;" class="fa fa-bell"></i>
                            @endif
                        @if(Auth::user()->unreadnotifications->count()>0)
                        <badge style="color: white;padding:0px 3px 0px 3px;background-color: red;border-radius: 60px;"><b id="unread-noti-count">{{Auth::user()->unreadnotifications->count()}}</b></badge>
                        @endif

                        <ul class="dropdown-menu notification-box" >
                            @if(Auth::user()->unreadnotifications->count()==0)
                            <li><a style="color: red;">Chưa có thông báo mới nào!</a></li>
                            @endif
                        @foreach(Auth::user()->unreadnotifications as $noti)
                          <li><a href="{{asset($noti->data['href'])}}" target="_blank" >{!!$noti->data['content']!!}</a></li>
                        @endforeach
                          <hr>
                        @foreach(Auth::user()->readnotifications->take(5) as $noti)
                          <li><a href="{{asset($noti->data['href'])}}" target="_blank" >{!!$noti->data['content']!!}</a></li>
                        @endforeach 
                        </ul>
                    </li>
                    {{--  --}}
                    @if(Auth::user()->role==1)
                    <li><a href="{{asset('admin')}}" target="_blank">Trang quản trị</a></li>
                    @endif
                    @endif
                    @if(Auth::check())


                    <li><img id="smallAvatar" src="{{asset(Auth::user()->avatar)}}" alt=""></li>
                    <li><a style="color: white;" href=""> {{Auth::user()->name}}</a></li>
                    
                    @else
                    <li><a href="{{asset('user/login')}}">Đăng nhập</a></li>
                    @endif
                    @if(Auth::check())
                    <li><button class="btn btn-info" style="margin-top: 7px;background-color: red;font-weight: bold;color: white;"><a title="Đăng xuất" href="{{route('userLogout')}}" style="color: white;"><i class="fas fa-power-off"></i></a></button></li>
                    
                    @else
                    <li class="hidden-xs hidden-sm"><button class="btn btn-info" style="margin-top: 7px;background-color: #09f;font-weight: bold;" data-toggle="modal" onclick="openModal()">Đăng ký</button></li>
                    @endif
                </ul>
            </div>
           
            
        </div>
    </div>
      
    </div>
    <!-- Posts -->

  
    <div class="container" ng-app>
        
        <div class="row">
            <div class="col-lg-2 ">
            <div class="hidden-sm hidden-xs section-sidebar">
            <div class="stealthy-scroll-container">
                <section>
                    <header>
                        <h3>Phổ biến</h3>
                    </header>
                </section>
                <ul class="nav">
                    <li class="category" id="hot"><a href="{{asset('hot')}}" class="label selected"><i class="fa fa-fire" style="color: red"></i>Đang hot</a></li>
                    <li class="category"><a href="{{asset('new')}}" id="new" class="label selected"  style="background-color: white;"><i class="fas fa-bolt" style="color: #41cdf4"></i>Mới</a></li>

                    
                </ul>
                <section>
                    <header>
                        <h3>Thể loại</h3>
                    </header>
                </section>
                 <ul class="nav">
                    @foreach($categories as $category)
                    <li class="category"><a href="{{asset('category/'.$category['id'])}}" class="label"> <i class="{{$category['icon']}}"></i>{{$category['name']}}</a></li>
                    @endforeach
                </ul>
                <hr>
                <section class="footer">
                    <p class="static">
                        <a href="/advertise">Advertise</a> 
                        <a href="/rules">Rules</a> 
                        <a href="/tips">Tips</a> 
                        <a href="/faq">FAQ</a>
                         <a href="/tos">Terms</a> 
                         <a href="/privacy">Privacy</a> 
                         <a href="/jobs">Jobs</a>
                          <a href="/contact">Contact</a>
                        </p> <p class="static sortable-consent" style="display: none;"><a href="javascript:void(0);">Manage Consent</a></p> <p class="static">VIETGAG © 2018</p>
                </section>
               
            </div>
            </div>
            </div>
            <div class="col-lg-7" >
                @yield('content')
                
            </div>
            <div class="col-lg-3">
                <div class="top-user-table">
                    <h3>Chúng tôi trên <i class="fab fa-facebook"></i></h3>
                    <div class="fb-page" data-href="https://www.facebook.com/Vietgag-984725918355772/?modal=admin_todo_tour" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Vietgag-984725918355772/?modal=admin_todo_tour" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Vietgag-984725918355772/?modal=admin_todo_tour">Vietgag</a></blockquote></div>
                </div>
            </div>
        </div>
    </div>

     <div class="modal" id="myModal">
      <div class="modal-dialog modal-md" style="width: 541px;border-radius: 0px;">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div id="beginBody">
                 <h1><b>Chào bạn!</b></h1>
                <p style="color:#999">Chào mừng đến với Vietgag! Hãy chia sẻ tất cả những gì ban thấy thú vị và nhận những lới nhận xét từ mọi người trên khắp thế giới.</p>
               
                <div class="facebook">
                    <table>
                        <tr>
                            <td class="icon"><i class="fab fa-facebook-f"></i></td>
                            <td>Facebook</td>
                        </tr>

                    </table>
                </div>
                 <div class="google">
                    <table>
                        <tr>
                            <td class="icon"><i class="fab fa-google-plus-g"></i></td>
                            <td>Google</td>
                        </tr>

                    </table>
                </div>
                <br>
                <hr>
                <br>
            </div>
           
            <div id="loginOption">
              Đăng ký với <a href="{{asset('register')}}">Email của bạn</a>
              <br>
              Bạn đã có tài khoản? <a href="{{asset('user/login')}}">Đăng nhập</a>
            </div>
                
            
          </div>

          <!-- Modal footer -->
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div> -->

        </div>
      </div>
    </div>
    <script >
        
        $('#loadmoreBtn').click(function(){
            $(this).parent().html("<img src='https://steemitimages.com/DQmTWvU8mjzBQA7U1mvWWcCUhQVcBCoj4Hvikd3tihoRzJQ/loading-animation2.gif' width='70px' height='70px' >");
                if(window.location.href.split("?page=")[1]==undefined){
                    window.location=window.location.href.split("?page=")[0]+"?page=2";
                }
                else{
                    var page=parseInt(window.location.href.split("?page=")[1])+1;
                    console.log(page);
                    window.location=window.location.href.split("?page=")[0]+"?page="+page;
                }
        })

    
        window.onload=function(){
            var list=document.querySelectorAll('.category>a');
            list=[...list];
            list.forEach((i)=>{
                if(window.location.href.includes(i.href)){
                    i.style.borderLeft="5px solid red";
                    i.classList.add('selected');
                }
                
            })
        }

        function openModal(){
            $('#myModal').modal('show');
        }

        function goNext(){
            document.getElementById('nextPost').innerHTML+="<img src='http://backgroundcheckall.com/wp-content/uploads/2017/12/ajax-loading-gif-transparent-background-5.gif' width='20px' height='20px'>";
            
            var id=window.location.href.split("post/")[1];
            $.get(window.location.origin+"/prev/"+id,function(data){
                if(data.id!=undefined)
                {
                    window.location=window.location.origin+"/post/"+data.id;    
                }
                
            });
        }

        
    </script>

</body>

</html>