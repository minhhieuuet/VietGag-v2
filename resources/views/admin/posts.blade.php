@extends('admin.parent')
@section('content')
<script >

  $(document).ready(function(){
    $('.editBtn').click(function(){
      let id=$(this).attr('idPost');
      $("#idPost").val(id); 
      let baseurl=window.location.origin;
      $.get(baseurl+"/admin/table/post/"+id+"/edit?id="+id,function(data,status){
        $('#title').val(data.title);
        $('#title').parent().addClass('is-filled');
        if(data.src.includes('http'))
        {
          $('#imgPreview').attr("src",data.src);  
        }
        else
        {
          $('#imgPreview').attr("src",window.location.origin+"/"+data.src);
        }
        $('#selectCate').val(data.idCategory);
        $('#author').val(data.author);
      });

    })
  })
  // Ajax load du lieu tu server
</script>
<script>

  function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#imgPreview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
// Function preview anh
  $(document).ready(function(){
    $('#imgInput').change(function(){
      readURL(this);
    })
  })
</script>
<script>

  function readURL1(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#imgPreview1').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
// Function preview anh
  $(document).ready(function(){
    $('#imgInput1').change(function(){
      readURL1(this);
    })
  })
</script>
<?php $count=1; ?>
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h2 class="card-title ">Bài đăng <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i>  Thêm</i></button></h2>
                  
                  <p class="card-category"> Danh sách bài đăng</p>

                </div>
                @if(session('alert'))
                <div class="container-fluid">
                <div class="alert alert-success text-center"" style="width: 100%;">
                  <img src="{{asset('tick.png')}}" width="50px" height="50px" alt="">  {{session('alert')}} 
                </div>
                </div>
                <script>
                  setTimeout(()=>{$('.alert-success').slideUp();},1000);
                  
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
                          Tiêu đề
                        </th>
                        <th>
                          Ảnh
                        </th>
                        <th>
                          Tác giả
                        </th>
                        <th>
                          Thể loại
                        </th>
                        
                        <th >
                          Tùy chọn
                        </th>
                      </thead>
                      <tbody>
                        @foreach($posts as $post)
                        <tr>
                          <td class="text-primary">
                            {{$count++}}
                          </td>
                          <td width="200px">
                            {{$post['title']}}
                          </td>
                          <td>
                            <img class="elevateImg" src="{{asset($post['src'])}}" alt="{{$post['title']}}" data-zoom-image="{{asset($post['src'])}}" width="200px" height="250px">
                          </td>
                          <td>
                             {{$post['author']}}
                          </td>
                          <td >
                            {{$post->category['name']}}
                          </td>
                          <td>
                            <div class="btn-group-vertical" role="group" >
                            <button class="btn btn-success editBtn" data-toggle="modal" data-target="#myModal1" idPost="{{$post['id']}}"><i class="fa fa-edit"></i> Sửa</button>
                            <button class="btn btn-primary "><i class="fa fa-eye-slash"></i> Ẩn</button>

                            {{Form::open([ 'method'  => 'delete', 'route' => [ 'post.destroy', $post->id ]])}}
                            {{ Form::hidden('id', $post->id) }}
                              <button class="btn btn-danger " onclick="confirmDel()"><i class="fa fa-trash"></i> DELETE</button>
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
                        {{$posts->links()}}  
                      </div>
                        
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
             <script>
        $('.elevateImg').elevateZoom();
      </script>
                   <!-- The Edit Modal  -->
              <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                            <h4 class="modal-title">Sửa bài đăng</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                  <div class="modal-body">
                      <div class="content">
                            <div class="card-body">

                         {{Form::open([ 'method'  => 'put', 'files' => true, 'route' => [ 'post.update', $post->id ]])}} 
                          <input type="hidden" name="id" id="idPost" value="">
                           @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Tiêu đề</label>
                              <input type="text" class="form-control" name="title" id="title" required="required">
                            </div>
                          </div>
                        
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              
                              <input type="file" class="custom-file-input" id="imgInput" name="imgInput" accept="image/x-png,image/gif,image/jpeg" aria-describedby="fileHelp">
                              <label class="custom-file-label" for="imgInput" >
                                 Chọn ảnh...
                              </label>
                              <br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <img id="imgPreview" src="https://increasify.com.au/wp-content/uploads/2016/08/default-image.png" alt="your image" width="250px" height="200px" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              
                              <!-- <input type="text" class="form-control" name="category"> -->
                              <select class="form-control" id="selectCate" name="selectCate" required>
                                  <option value="" disabled selected>Chọn một trong các mục sau ▼</option>
                                  @foreach($categories as $category)
                                  <option value="{{$category['id']}}">{{$category['name']}}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                        
                        
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">Tác giả</label>
                              <input type="text" class="form-control" name="author" id="author" value="Admin">
                            </div>
                          </div>
                    
                        </div>
                      
                        <div class="clearfix"></div>
                      
                </div>  
                    </div>
                  </div>
                  
                  <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Cập nhật</button>
                            <button type="button"  class="btn btn-danger" data-dismiss="modal">Thoát</button>
                          </div>
                </div>
            {{ Form::close() }}
              </div>
            </div>
             <!-- The create Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Thêm bài đăng</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                     <div class="content">
                        <div class="card-body">
                        <!-- Form nhap du lieu -->
                      <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Tiêu đề</label>
                              <input type="text" class="form-control" name="title" required="required">
                            </div>
                          </div>
                        
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              
                              <input type="file" class="custom-file-input" id="imgInput1" name="imgInput1" accept="image/x-png,image/gif,image/jpeg" aria-describedby="fileHelp">
                              <label class="custom-file-label" for="imgInput1" >
                                 Chọn ảnh...
                              </label>
                              <br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <img id="imgPreview1" src="https://increasify.com.au/wp-content/uploads/2016/08/default-image.png" alt="your image" width="250px" height="200px" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              
                              <!-- <input type="text" class="form-control" name="category"> -->
                              <select class="form-control" name="selectCate" required>
                                  <option value="" disabled selected>Chọn một trong các mục sau ▼</option>
                                  @foreach($categories as $category)
                                  <option value="{{$category['id']}}">{{$category['name']}}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Tác giả</label>
                              <input type="text" class="form-control" name="author" value="Admin">
                            </div>
                          </div>
                         
                        </div>
                       
                        
                        <div class="clearfix"></div>
                      
                </div>  
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Thêm</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                    </div>
                    </form>
                  </div>
                </div>
           
          </div>
        </div>
      </div>
     

@endsection