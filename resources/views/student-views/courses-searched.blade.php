@extends('student-layouts.details')
@section('page-content')
	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="{{asset('mainpage-template/img/page-bg/1.jpg')}}">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Home</a>
				<span>Courses</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->
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
            {{-- <li class="control" data-filter=".design">Design</li>
            <li class="control" data-filter=".web">Web Development</li>
            <li class="control" data-filter=".photo">Photography</li> --}}

        </ul>
        <div class="row course-items-area">
            @foreach ($courses as $course )
            <!-- course -->
            <div class="mix col-lg-3 col-md-4 col-sm-6 filter{{$course->hasCategory->id}}">
                <div class="course-item">
                    <div class="course-thumb set-bg" data-setbg="{{asset('images/categories')}}/{{$course->image}}">
                        <div class="price">{{$course->price}}</div>
                    </div>
                    <div class="course-info">
                        <div class="course-text">
                            <h5>{{$course->name}}</h5>
                            <p>{{$course->desc}}</p>
                            <div class="students">120 Students</div>
                        </div>
                        <div class="course-author">
                            <div class="ca-pic set-bg" data-setbg="{{asset('mainpage-template/img/authors/1.jpg')}}"></div>
                            <p>{{$course->hasOwner->name}}, <span>{{ucfirst($course->hasOwner->hasRole->role)}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="section-title mb-0 pb-2">
            <h2>Xem các khóa học của của danh mục</h2>
        </div>

        <div class="featured-courses">
            @foreach ($courses_searched as $key => $course)
        @if($key % 2 == 0)
        <div class="featured-course course-item">
            <div class="course-thumb set-bg" data-setbg="{{asset('images/courses')}}/{{$course->image}}">
                <div class="price">{{$course->price}}</div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-6 pl-0">
                    <div class="course-info">
                        <div class="course-text">
                            <div class="fet-note">Featured Course</div>
                            <h5>{{$course->name}}</h5>
                            <p>{{$course->desc}}</p>
                            <div class="students">120 Students</div>
                        </div>
                        <div class="course-author">
                            <div class="ca-pic set-bg" data-setbg="{{asset('images/avatar')}}/{{$course->hasOwner->avatar}}"></div>
                            <p>{{$course->hasOwner->name}}, <span>{{$course->hasOwner->hasRole->role}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="featured-course course-item">
            <div class="course-thumb set-bg" data-setbg="{{asset('mainpage-template/img/courses/f-2.jpg')}}">
                <div class="price">{{$course->price}}</div>
            </div>
            <div class="row">
                <div class="col-lg-6 pr-0">
                    <div class="course-info">
                        <div class="course-text">
                            <div class="fet-note">Featured Course</div>
                            <h5>{{$course->name}}</h5>
                            <p>{{$course->desc}}</p>
                            <div class="students">120 Students</div>
                        </div>
                        <div class="course-author">
                            <div class="ca-pic set-bg" data-setbg="{{asset('mainpage-template/img/authors/2.jpg')}}"></div>
                            <p>{{$course->hasOwner->name}}, <span>{{$course->hasOwner->hasRole->role}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach



        </div>
    </div>
</section>
<!-- course section end -->
@stop
