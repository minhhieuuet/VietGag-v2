@extends('admin.parent')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">

                <div class="card-header card-header-primary">
                  <h4 class="card-title">Sửa thông tin cá nhân</h4>
                  <p class="card-category">Cập nhật thông tin cá nhân của bạn</p>

                </div>
                @if(session('alert'))
                <div class="container-fluid">
                <div class="alert alert-success text-center"" style="width: 100%;">
                  <img src="{{asset('tick.png')}}" width="50px" height="50px" alt="">  {{session('alert')}} 
                </div>
                </div>
                <script>
                  setTimeout(()=>{$('.alert-success').slideUp();},2000);
                  
                </script>
                @endif
                
                {{Form::open(['method'=>'put','route'=>['profile.update',Auth::user()->id]])}}
                      @csrf
                <div class="card-body">
                  
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tên đầy đủ</label>
                          <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email </label>
                          <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        @if($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>
                                @endforeach
                            </ul>
                          </div>
                        
                        @endif
                      </div>
                    
                    </div>
                   {{--  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Về bản thân tôi</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Đôi điều về bạn</label>
                            <textarea class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary pull-right">Cập nhật thông tin</button>
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a>
                    <img class="img" src="{{asset(Auth::user()->avatar)}}" />
                      
                  </a>

                </div>
                <div class="card-body">
                <i class="fas fa-camera"> Đổi ảnh đại diện</i>
                  <h6 class="card-category text-gray">VIETGAG</h6>
                  <h4 class="card-title">{{Auth::user()->name}}</h4>
                 <!--  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p> -->
                  <!-- <a href="#pablo" class="btn btn-primary btn-round">Follow</a> -->
                </div>
              </div>
            </div>
            {{Form::close()}}
          </div>
        </div>
      </div>
@endsection