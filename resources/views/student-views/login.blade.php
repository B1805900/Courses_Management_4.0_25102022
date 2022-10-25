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
    <form action="{{route('studentLogin')}}" method="POST">
        @csrf
    <div class="container-fluid px-4 px-md-4 py-5 mx-auto">
        <div class="row d-flex justify-content-center align">



            <div class="card p-0 border-0 rounded-0 mb-5">
                <div class="card border-0 rounded-0 card0">
                <h1 class="mb-0">Xin chào!</h1>
                <p>Đăng nhập bằng email của bạn</p>
                @if (Session::has('success'))
                <p class="text-success"><strong>{{ Session::get('success') }}</strong></p>
                    @elseif(Session::has('error'))
                    <p class="text-danger"><strong>{{ Session::get('error') }}</strong></p>

                @endif
                <label class="font-weight-bold mb-0">Email</label>
                <input type="email" name="email" class="mb-4" placeholder="abc@xyz.com">
                @error('email')
                    <small class="text-danger"><strong>{{ $message }}</strong></small>
                @enderror
                <label class="font-weight-bold mb-0">Password</label>
                <input type="password" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">
                @error('password')
                <small class="text-danger"><strong>{{ $message }}</strong></small>
                @enderror
                <a href="#" class="text-sm ml-auto text-dim">Forgot Password?</a>

                <div class="row justify-content-center mt-4">
                    <button type="submit" class="btn btn-yellow px-5">Đăng nhập</button>

                </div>
                <div class="row justify-content-center mt-3">
                    <a href="{{route('showMainPage')}}" class="btn btn-secondary ">Trở lại</a>
                </div>
                <div class="row justify-content-center mt-4">
                    <a href="{{route('showRegisterStudent')}}" class="text-dim">Chưa có tài khoản? đăng ký ngay.</a>
                </div>

                </div>
                <img src="{{asset('mainpage-template/img/signup-bg.jpg')}}" class="mt-auto">
            </div>



        </div>
    </div>
</form>
</body>
</html>
