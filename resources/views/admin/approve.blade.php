@extends('admin.parent')
@section('content')

<?php $count=1; ?>
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h2 class="card-title "><i class="fas fa-check-circle"></i> DUYỆT BÀI</h2>
                  
                  <p class="card-category"> Danh sách bài cần duyệt</p>

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
                          Người đăng
                        </th>
                        <th>
                          Thể loại
                        </th>
                        
                        <th >
                          Duyệt bài
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
                             {{$post->author['name']}}
                          </td>
                          <td >
                            {{$post->category['name']}}
                          </td>
                          <td>

                            <div class="btn-group-vertical" role="group" >
                            @if($post['approved']==0)
                            
                            <a href="{{asset('admin/table/accept/'.$post['id'])}}">
                            <button class="btn btn-success " title="Duyệt bài" ><i class="fas fa-check" style="font-size: 15px;"></i></button>
                            </a>
                            @else
                            <button class="btn btn-warning " disabled="disabled" title="Đã duyệt" ><i class="fas fa-check"></i> </button>
                            @endif
                            

                            {{Form::open([ 'method'  => 'delete', 'route' => [ 'approve.destroy', $post->id ]])}}
                            {{ Form::hidden('id', $post->id) }}
                              <button class="btn btn-danger " ><i class="fa fa-trash"></i></button>
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
            
             
           
          </div>
        </div>
      </div>
     

@endsection