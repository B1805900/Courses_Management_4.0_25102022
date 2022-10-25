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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="{{asset('mainpage-template/css/style.css')}}"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body {{ Session::has('sucess') ? 'data-notification' : '' }} data-notification-type='{{ Session::get('sucess') }}' data-notification-message='{{ json_encode(Session::get('success')) }}'>

	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
    <input type="hidden" name="idUser" value="{{Auth::id()}}">
	<!-- Header section -->
	<header class="header-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="site-logo">
						<img src="{{asset('mainpage-template/img/logo.png')}}" alt="">
					</div>
					<div class="nav-switch">
						<i class="fa fa-bars"></i>
					</div>
				</div>
				<div class="col-lg-9 col-md-9">
                    @if(Auth::check())
                    <a href="{{route('myLogout')}}" class="site-btn header-btn">Logout</a>
                    @else
					<a href="{{route('showLoginStudent')}}" class="site-btn header-btn">Login</a>
                    @endif
					<nav class="main-menu">
						<ul>
							<li><a href="{{route('showMainPage')}}">Home</a></li>
							<li><a href="#">About us</a></li>
							<li><a href="courses.html">Khóa học</a></li>
							<li><a href="blog.html">WishList</a></li>
                            @if(Auth::check())
                            <li> <a   href="{{route('MyAccount')}}">Tài khoản</a></li>
                            @endif
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="{{asset('mainpage-template/img/bg.jpg')}}">
		<div class="container">
			<div class="hero-text text-white">
				<h2>Get The Best Free Online Courses</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla <br> dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
            @if (!Auth::user())
            <div class="row">
				<div class="col-lg-10 d-flex justify-content-center offset-lg-1">
					<form class="intro-newslatter">

						<button type="button" onclick="window.location='{{ route("showRegisterStudent") }}'" class="site-btn">Sign Up Now</button>

					</form>
				</div>
			</div>
            @endif

		</div>
	</section>
	<!-- Hero section end -->


        @yield('page-content')


    <!-- banner section -->
	<section class="banner-section spad">
		<div class="container">
			<div class="section-title mb-0 pb-2">
				<h2>Join Our Community Now!</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
			<div class="text-center pt-5">
				<a href="#" onclick="window.location='{{ route("showRegisterStudent") }}'" class="site-btn">Register Now</a>
			</div>
		</div>
	</section>
	<!-- banner section end -->


	<!-- footer section -->
	<footer class="footer-section spad pb-0">
		<div class="footer-top">
			<div class="footer-warp">
				<div class="row">
					<div class="widget-item">
						<h4>Contact Info</h4>
						<ul class="contact-list">
							<li>1481 Creekside Lane <br>Avila Beach, CA 931</li>
							<li>+53 345 7953 32453</li>
							<li>yourmail@gmail.com</li>
						</ul>
					</div>
					<div class="widget-item">
						<h4>Engeneering</h4>
						<ul>
							<li><a href="">Applied Studies</a></li>
							<li><a href="">Computer Engeneering</a></li>
							<li><a href="">Software Engeneering</a></li>
							<li><a href="">Informational Engeneering</a></li>
							<li><a href="">System Engeneering</a></li>
						</ul>
					</div>
					<div class="widget-item">
						<h4>Graphic Design</h4>
						<ul>
							<li><a href="">Applied Studies</a></li>
							<li><a href="">Computer Engeneering</a></li>
							<li><a href="">Software Engeneering</a></li>
							<li><a href="">Informational Engeneering</a></li>
							<li><a href="">System Engeneering</a></li>
						</ul>
					</div>
					<div class="widget-item">
						<h4>Development</h4>
						<ul>
							<li><a href="">Applied Studies</a></li>
							<li><a href="">Computer Engeneering</a></li>
							<li><a href="">Software Engeneering</a></li>
							<li><a href="">Informational Engeneering</a></li>
							<li><a href="">System Engeneering</a></li>
						</ul>
					</div>
					<div class="widget-item">
						<h4>Newsletter</h4>
						<form class="footer-newslatter">
							<input type="email" placeholder="E-mail">
							<button class="site-btn">Subscribe</button>
							<p>*We don’t spam</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="footer-warp">
				<ul class="footer-menu">
					<li><a href="#">Terms & Conditions</a></li>
					<li><a href="#">Register</a></li>
					<li><a href="#">Privacy</a></li>
				</ul>
				<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
			</div>
		</div>
	</footer>
	<!-- footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('mainpage-template/js/jquery-3.2.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="{{asset('mainpage-template/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('mainpage-template/js/mixitup.min.js')}}"></script>
	<script src="{{asset('mainpage-template/js/boocircle-progress.min.js')}}"></script>
	<script src="{{asset('mainpage-template/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('mainpage-template/js/bootmain.js')}}"></script>
	<script src="{{asset('mainpage-template/js/main.js')}}"></script>
    <script>
(function(){
    // Don't go any further down the script if [data-notification] is not set.
    if ( ! document.body.dataset.notification)
        return false;

    var message = document.body.dataset.notification;
    return $.toast({
    text: message, // Text that is to be shown in the toast
    heading: 'Note', // Optional heading to be shown on the toast
    icon: 'success', // Type of toast icon
    showHideTransition: 'fade', // fade, slide or plain
    allowToastClose: true, // Boolean value true or false
    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
    stack: 3, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
    position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



    textAlign: 'left',  // Text alignment i.e. left, right or center
    loader: true,  // Whether to show loader or not. True by default
    loaderBg: '#D82A4E',  // Background color of the toast loader
    beforeShow: function () {}, // will be triggered before the toast is shown
    afterShown: function () {}, // will be triggered after the toat has been shown
    beforeHide: function () {}, // will be triggered before the toast gets hidden
    afterHidden: function () {}  // will be triggered after the toast has been hidden
});


    // toastr['info']('message') is the same as toastr.info('message')
})();
    function account(){
        console.log("clicked account");
    }
    </script>


@if(Session::has("success"))
<script >
$(document).ready(function(){
    $.toast({
    text: $('#success').val(), // Text that is to be shown in the toast
    heading: 'Note', // Optional heading to be shown on the toast
    icon: 'success', // Type of toast icon
    showHideTransition: 'fade', // fade, slide or plain
    allowToastClose: true, // Boolean value true or false
    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
    position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



    textAlign: 'left',  // Text alignment i.e. left, right or center
    loader: true,  // Whether to show loader or not. True by default
    loaderBg: '#d82a4e',  // Background color of the toast loader
    beforeShow: function () {}, // will be triggered before the toast is shown
    afterShown: function () {}, // will be triggered after the toat has been shown
    beforeHide: function () {}, // will be triggered before the toast gets hidden
    afterHidden: function () {}  // will be triggered after the toast has been hidden
});
})

</script>
@endif
    @yield('page-js')
</body>
    </html>
