<!DOCTYPE html>
<html lang="en">
<head>
    <title>WebUni - Education Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="WebUni Education Template">
	<meta name="keywords" content="webuni, education, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="{{asset('mainpage-template/img/favicon.ico')}}" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('mainpage-template/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('mainpage-template/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('mainpage-template/css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('mainpage-template/css/login-register.css')}}"/>
</head>
<body>
    <form action="{{route('studentRegister')}}" method="POST">
        @csrf
    <div class="container-fluid px-4 px-md-4 py-5 mx-auto">
        <div class="row d-flex justify-content-center align">



            <div class="card border-0 rounded-0 mb-5">
                <h1 class="mb-2">Đăng ký tài khoản</h1>
                <small class="mb-3">Nhập thông tin cơ bản bên dưới</small>
                @if (Session::has('error'))
                <p class="text-danger"><strong>{{ Session::get('error') }}</strong></p>

                @endif
                <label class="font-weight-bold mb-0">Họ và tên</label>
                <input type="text" name="name" class="mb-4" placeholder="John Harry">
                @error('name')
                <p class="text-danger"><strong>{{ $message }}</strong></p>
                @enderror
                <label class="font-weight-bold mb-0">Email</label>
                <input type="email" name="email" class="mb-4" placeholder="abc@xyz.com">
                @error('email')
                <p class="text-danger"><strong>{{ $message }}</strong></p>
                @enderror
                <label class="font-weight-bold mb-0">Mật khẩu</label>
                <input type="password" class="mb-4" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" minlength="8">
                <small class="text-muted">Mật khẩu ít nhất 8 ký tự</small>
                @error('password')
                <p class="text-danger"><strong>{{ $message }}</strong></p>
                @enderror
                <label class="font-weight-bold mb-0">Xác nhận mật khẩu</label>
                <input type="password" name="password_confirmation" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" minlength="8">
                <small class="text-muted">Nhập lại mật khẩu</small>


                <div class="row justify-content-around px-3 mt-5">

                    <button type="submit" class="btn btn-yellow px-3 mr-3">Đăng ký</button>
                    <a href="{{ route('showMainPage') }}" class="btn btn-secondary ">Trở lại</a>

                </div>
                <div class="row justify-content-center mt-4">
                    <a href="{{route('showLoginStudent')}}" class="text-dim">Đã có tài khoản? đăng nhập ngay.</a>
                </div>
            </div>



        </div>
    </div>
</form>
</body>
</html>
