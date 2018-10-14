
 <div class="sidebar" data-color="orange" data-background-color="white" data-image="{{asset('adminlayout/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="{{asset('')}}" class="simple-text logo-normal">
          <img src="{{asset('logo.png')}}" width="50px" height="50px" alt="">
          <b>Vietgag</b>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{asset('admin')}}">
              <i class="material-icons">dashboard</i>
              <p>Trang chủ</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{asset('admin/profile')}}">
              <i class="material-icons">person</i>
              <p>Thông tin cá nhân</p>
            </a>
          </li>

          <li class="nav-item dropdown " id="tableItem" >
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true">
             <i class="material-icons">content_paste</i>
              <p>Bảng</p>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="width: 88%;">
              <a class="dropdown-item" href="{{asset('admin/table/category')}}">Danh mục</a>
              <a class="dropdown-item" href="{{asset('admin/table/post')}}">Bài đăng</a>

              <a class="dropdown-item" href="">Bình luận</a>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{asset('admin/approve')}}">
              <i class="fas fa-check-circle"></i>
              <p>Duyệt bài</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{asset('admin/user')}}">
              <i class="fas fa-users"></i>
              <p>Quản lý người dùng</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Thông báo</p>
            </a>
          </li>
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    <!-- Script them class active -->
  <script>

    var nav=document.querySelectorAll('.nav-item');
    nav=[...nav];
    nav.forEach((i)=>{
      i.classList.remove("active");

      if(i.getElementsByTagName('a')[0].href==window.location.href.split("?")[0]){
         i.classList.add("active");
      }

    });
      // Them class active cho table
      if(window.location.href.includes(window.location.origin+'/admin/table'))
      {
        document.getElementById('tableItem').classList.add("active");
      }

 </script>
