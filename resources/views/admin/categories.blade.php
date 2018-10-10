@extends('admin.parent')
@section('content')
<script >

  $(document).ready(function(){
    $('.editBtn').click(function(){
    	let id=$(this).attr('idCate');
    	$("#idCategory").val(id);
    	let baseurl=window.location.origin;
    	$.get(baseurl+"/admin/table/category/"+id+"/edit?id="+id,function(data,status){
    		$("#name").val(data.name);
    		$("#name").parent().addClass("is-focused");
    		$("#icon").val(data.icon);
    		$("#icon").parent().addClass("is-focused");
    		$("#description").val(data.description);
    		$("#description").parent().addClass("is-focused");

    	});
    })
  })
  // Script ajax load edit content from server
</script>
<?php $count=1 ?>
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h2 class="card-title ">Danh mục <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Thêm</i></button></h2>

                  <p class="card-category"> Danh sách các danh mục</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Tên danh mục
                        </th>
                        <th>
                           Icon
                        </th>
                        <th>
                          Mô tả
                        </th>
                        <th>
                          Số bài đăng
                        </th>

                        <th >
                          Tùy chọn
                        </th>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                        <tr>
                          <td class="text-primary">
                            {{$count++}}
                          </td>
                          <td width="200px">
                            {{$category['name']}}
                          </td>
                          <td>
                           	<i class="{{$category['icon']}}" style="font-size: 40px;"></i>
                          </td>
                          <td>
                             {{$category['description']}}
                          </td>
                         	<td>
                         		{{$category->post->count()}} bài
                         	</td>
                          <td>
                            <div class="btn-group-vertical" role="group"  >

                            <button class="btn btn-success editBtn" data-toggle="modal" data-target="#myModal1"  idCate="{{$category->id}}" >

                            	<i class="fa fa-edit"></i> EDIT

                            </button>
                            <!-- {{Form::open([ 'method'  => 'get', 'route' => [ 'category.edit', $category->id ]])}}
                            {{ Form::hidden('id', $category->id) }}
                              <button class="btn btn-danger " ><i class="fa fa-trash"></i> DELETE</button>
                               {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }} -->

                            <button class="btn btn-primary "><i class="fa fa-eye-slash"></i> HIDE</button>

                              <!-- <button class="btn btn-danger " ><i class="fa fa-trash"></i> Edit</button> -->
                                <!-- {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }} -->

                            {{Form::open([ 'method'  => 'delete', 'route' => [ 'category.destroy', $category->id ]])}}
                            {{ Form::hidden('id', $category->id) }}
                              <button class="btn btn-danger " ><i class="fa fa-trash"></i> DELETE</button>
                                <!-- {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }} -->
                            {{ Form::close() }}
                          </div>
                          </td>
                        </tr>
                        <!-- The Edit Modal  -->
                      <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                                <h4 class="modal-title">Sửa danh mục</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                      <div class="modal-body">
                          <div class="content">
                                <div class="card-body">



                                <!-- Form nhap du lieu -->
                             {{Form::open([ 'method'  => 'put', 'route' => [ 'category.update', $category->id ]])}}
                              <input type="hidden" name="id" id="idCategory" value="">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Tên danh mục</label>
                                      <input type="text" class="form-control" name="name" id="name" required="required">
                                    </div>
                                  </div>

                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Icon</label>
                                      <input type="text" class="form-control" name="icon" id="icon">
                                    </div>
                                  </div>

                                </div>

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Mô tả</label>
                                      <textarea rows="5" class="form-control" name="description" style="text-align:left" id="description" ></textarea>
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
                        @endforeach

                      </tbody>

                    </table>
                    <div class="d-flex">
                      <div class="mx-auto">
                        {{ $categories->links() }}
                      </div>

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
