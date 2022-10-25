@php
                    // $user =  App\Models\User::find(session()->get('loginID'));

@endphp
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{asset('dashboard-template/assets/images/faces/face1.jpg')}}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
            <span class="text-secondary text-small">{{Auth::user()->hasRole->role}}</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <span class="menu-title">Trang chủ</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#course-manage-collapse" aria-expanded="false" aria-controls="course-manage-collapse">
          <span class="menu-title">Quản lý khóa học</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
        <div class="collapse" id="course-manage-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('showAllCourse')}}">Danh sách khóa học</a></li>
            @if (Auth::user()->isAdmin())
            <li class="nav-item"> <a class="nav-link" href="{{route('showAllCategory')}}">Danh sách danh mục</a></li>
            @endif
          </ul>
        </div>
      </li>
      @if (Auth::user()->isAdmin())
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#user-manage-collapse" aria-expanded="false" aria-controls="user-manage-collapse">
          <span class="menu-title">Quản lý người dùng</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-account-settings menu-icon"></i>
        </a>
        <div class="collapse" id="user-manage-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('showAllUser')}}"> Danh sách người dùng </a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Thay đổi mật khẩu </a></li> --}}
          </ul>
        </div>
      </li>
      @endif

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#user-profile-collapse" aria-expanded="false" aria-controls="user-profile-collapse">
          <span class="menu-title">Quản lý tài khoản</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-account-settings menu-icon"></i>
        </a>
        <div class="collapse" id="user-profile-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('showUserProfile')}}"> Thông tin cá nhân </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('showChangePassword')}}"> Thay đổi mật khẩu </a></li>
          </ul>
        </div>
      </li>

    </ul>
  </nav>
