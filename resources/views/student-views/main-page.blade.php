@extends('student-layouts.main')
@section('page-content')
<!-- categories section -->
<section class="categories-section spad">
    <div class="container">
        <div class="section-title">
            <h2>Our Course Categories</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
        </div>
        <div class="row">
            @foreach ($categories as $category)
            <!-- categorie -->
            <div class="col-lg-4 col-md-6">
                <div class="categorie-item">
                    <div class="ci-thumb set-bg" data-setbg="{{asset('images/categories')}}/{{$category->image}}"></div>
                    <div class="ci-text">
                        <h5>{{$category->name}}</h5>
                        <p>{{$category->description}}</p>
                        <span>{{$category->hasCourses->count()}} khóa học</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$categories->links()}}
    </div>
</section>
<!-- categories section end -->


<!-- search section -->
<section class="search-section">
    <div class="container">
        <div class="search-warp">
            <div class="section-title text-white">
                <h2>Tìm kiếm khóa học</h2>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <!-- search form -->
                    <form method="POST" action="{{route('searchCourseByNameAndCat')}}" class="course-search-form">
                        @csrf
                        <input name="course_name" type="text" required placeholder="Nhập tên khóa học" >
                        {{-- <input name="category_name" type="text" required class="last-m" placeholder="Category"> --}}
                        <select name="category_id" class="custom-select custom-select-lg mb-3 "
                        style="    height: 56px;
                        width: 36.6%;
                        padding: 0 30px;
                        margin-right: 18px;
                        float: left;
                        border: none;
                        font-size: 14px;
                        background: #edf4f6;"
                        required
                        >
                            <option selected disabled value="">Chọn danh mục</option>
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach
                          </select>
                        <button type="submit" class="site-btn">Search Couse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- search section end -->


<!-- course section -->
<section class="course-section spad">
    <div class="container">
        <div class="section-title mb-0">
            <h2>Featured Courses</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
        </div>
    </div>
    <div class="course-warp">
        <ul class="course-filter controls">
            <li class="control active" data-filter="all">All</li>
            @foreach ($categories as $category)
            <li class="control" data-filter=".filter{{$category->id}}">{{$category->name}}</li>
            @endforeach

        </ul>
        <div class="row course-items-area">
            @foreach ($courses as $course )
            <!-- course -->
            <div class="mix col-lg-3 col-md-4 col-sm-6 filter{{$course->hasCategory->id}}">
                <div class="course-item">
                    <div class="course-thumb set-bg"   data-setbg="{{asset('images/categories')}}/{{$course->image}}">
                        {{-- <a href="{{route('showSingleCourse',['idCourse' => $course->id])}}"></a> --}}
                        <div class="row d-flex justify-content-around">

                            <div class="price">
                                    <div>{{$course->price}}</div>

                            </div>
                            <div class="price" style="border-radius: 50%;" >
                                {{-- <a style="color: inherit !important;" href="#"><i class="fa fa-check-circle"></i></a> --}}
                                @if (Auth::user() && Auth::user()->hasWishItems()->where('course_id','=',$course->id)->count() != 0)
                                <a style="color: inherit !important;" href=""><i class="fa fa-check-circle"></i></a>
                                @elseif (Auth::user() && Auth::user()->hasWishItems()->where('course_id','=',$course->id)->count() == 0)
                                <a style="color: inherit !important;" href="{{route('addToWishList',['idCourse'=> $course->id])}}"><i class="fa fa-heart"></i></a>
                                @else
                                <a style="color: inherit !important;" onclick="needLogin(event)" href=""><i class="fa fa-heart"></i></a>

                                @endif

                        </div>
                        </div>
                    </div>
                    <div class="course-info">
                        <div class="course-text">
                            <h5><a href="{{route('showSingleCourse',['idCourse' => $course->id])}}" style="color: inherit !important;">{{$course->name}}</a></h5>
                            <p>{{$course->desc}}</p>

                            <div class="students d-flex justify-content-around">
                                  <div style="padding: 13px">120 Students</div>
                                  <form action="{{route('pay')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="idCourse">
                                    <input type="hidden" name="amount" value="{{number_format((float)preg_replace('/[^0-9]/','',$course->price)/24855,2,'.','')}}">
                                    <button type="submit" style="border:none;background: #d82a4e;padding: 13px 19px;color: #fff;font-size: 14px;">Mua với PAYPAL <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>

                                </form>

                                <input type="hidden" id="success" value="{{Session::get('success')}}">
                            </div>
                        </div>
                        <div class="course-author">
                            <div class="ca-pic set-bg" data-setbg="{{asset('images/avatar')}}/{{$course->hasOwner->avatar}}"></div>
                            <p>{{$course->hasOwner->name}}, <span>{{ucfirst($course->hasOwner->hasRole->role)}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- course section end -->

@if (!Auth::user())
<!-- signup section -->
<section class="signup-section spad">
    <div class="signup-bg set-bg" data-setbg="{{asset('mainpage-template/img/img/signup-bg.jpg')}}"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="signup-warp">
                    <div class="section-title text-white text-left">
                        <h2>Sign up to became a teacher</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
                    </div>
                    <!-- signup form -->
                    <form class="signup-form">
                        <input type="text" placeholder="Your Name">
                        <input type="text" placeholder="Your E-mail">
                        <input type="text" placeholder="Your Phone">
                        <label for="v-upload" class="file-up-btn">Upload Course</label>
                        <input type="file" id="v-upload">
                        <button class="site-btn">Search Couse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Large modal -->
@endif



<!-- signup section end -->

@stop

@section('page-js')
<Script>
    function needLogin(e){

        e.preventDefault();
    var need_login =  $.toast({
    text: "Đăng nhập để tiếp tục", // Text that is to be shown in the toast
    heading: 'Lưu ý!', // Optional heading to be shown on the toast
    icon: 'info', // Type of toast icon
    showHideTransition: 'fade', // fade, slide or plain
    allowToastClose: true, // Boolean value true or false
    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
    stack: 3, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
    position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



    textAlign: 'left',  // Text alignment i.e. left, right or center
    loader: true,  // Whether to show loader or not. True by default
    loaderBg: '#d82a4e',  // Background color of the toast loader
    beforeShow: function () {}, // will be triggered before the toast is shown
    afterShown: function () {}, // will be triggered after the toat has been shown
    beforeHide: function () {}, // will be triggered before the toast gets hidden
    afterHidden: function () {}  // will be triggered after the toast has been hidden
});
return needLogin
}


</Script>

@stop
