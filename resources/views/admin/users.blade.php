@extends('admin.parent')
@section('content')

<?php $count=1 ?>
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h2 class="card-title "> <i class="fas fa-users"></i> Người dùng </h2>
                  
                  <p class="card-category"> Danh sách người dùng</p>
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
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Tên người dùng
                        </th>
                        <th>
                           Email
                        </th>
                       
                        <th>
                          Ngày tham gia
                        </th>
                        <td>
                        	Trạng thái
                        </td>
                        <th >
                          Tùy chọn
                        </th>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <td class="text-primary">
                            {{$count++}}
                          </td>
                          <td width="200px">
                            {{$user['name']}}
                          </td>
                          <td>
                           {{$user['email']}}
                          </td>
                          <td>
                             {{$user['created_at']}}
                          </td>
                         	<td>
                         		{{Form::open(['method'=>'put','route'=>['user.update',$user->id]])}}
                         		@if($user['active']==0)
                         			<button class="btn btn-warning" type="submit"><i  class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Đang bị chặn</button>
                         		@else
                         			<button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Đang hoạt động</button>
                         		@endif
                         		{{Form::close()}}
                         	</td>
                          <td>
                            <div class="btn-group-vertical" role="group"  >
                           
                            {{Form::open([ 'method'  => 'delete', 'route' => [ 'user.destroy', $user->id ]])}}	
                            {{ Form::hidden('id', $user->id) }}
                              <button onclick="return confirm('Bạn chắc chắn muốn xóa người dùng này chứ?');" class="btn btn-danger " ><i class="fa fa-trash"></i> Xóa</button>
                                <!-- {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }} -->
                            {{ Form::close() }}
                          </div>
                          </td>
                        </tr>
                        @endforeach

                      </tbody>

                    </table>
                    <div class="d-flex">
                      <div class="mx-auto">
                        {{ $users->links() }}  
                      </div>
                        
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

            
             
                

                
        	   <!-- The Create Modal  -->
        	   <div class="modal" id="myModal" data-modal="modal-window-two">
                <div class="modal-dialog">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Thêm danh mục</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                     <div class="content">
                        <div class="card-body">
                        <!-- Form nhap du lieu -->
                      <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Tên danh mục</label>
                              <input type="text" class="form-control" name="name" required="required">
                            </div>
                          </div>
                        
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Icon</label>
                              <input type="text" class="form-control" name="icon" >
                            </div>
                          </div>
                        
                        </div>
                        
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group"> 
                              <label class="bmd-label-floating">Mô tả</label>
                              <textarea rows="5" class="form-control" name="description" style="text-align:left" required="required">Không có mô tả</textarea>
                            </div>
                          </div>
                         
                        </div>
                       
                        
                        <div class="clearfix"></div>
                      
                		</div>  
                    </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Thêm</button>
                      <button type="button"  class="btn btn-danger" data-dismiss="modal">Thoát</button>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
            <!-- End create modal -->
      </div>


@endsection