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
                <div class="card-body">
                  <form>
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tên đăng nhập</label>
                          <input type="text" class="form-control" value="{{Auth::user()->name}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email </label>
                          <input type="email" class="form-control" value="{{Auth::user()->email}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tên đầy đủ</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Địa chỉ</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Về bản thân tôi</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Đôi điều về bạn</label>
                            <textarea class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Cập nhật thông tin</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="{{asset('default-avatar.png')}}" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">VIETGAG</h6>
                  <h4 class="card-title">{{Auth::user()->name}}</h4>
                 <!--  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p> -->
                  <!-- <a href="#pablo" class="btn btn-primary btn-round">Follow</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection