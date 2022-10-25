<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class CoursesController extends Controller
{
    public function showAllCourse(){
        $courses = Course::paginate(10);
        return view('course-views.course-list',compact('courses'));
    }

    public function showAllCategory(){
        $categories = Category::paginate(10);

        return view('course-views.course-category',compact('categories'));
    }
    public function addCategory(){
        return view('course-views.add-category',);
    }
    public function addCourse(){
        $categories = Category::paginate();
        return view('course-views.add-course',compact('categories'));
    }
    public function addLesson($id){
        $course = Course::find($id);
        return view('course-views.add-lesson',compact('course'));
    }
    public function showAllLesson($id){
        $course = Course::find($id);
        $lessons = Lesson::where('course_id','=',$course->id)->paginate(10);
        return view('course-views.lesson-list',compact('course','lessons'));
    }


    public function storeCategory(Request $request){
        
        $request->validate([
            'name' => 'required|max:255|unique:categories,name',
            'img' => 'required|max:10000',
            'desc' => 'required|min:30'
        ],[
            'name.required' => 'Tên danh mục không được bỏ trống',
            'name.unique' => 'Tên danh mục đã được tạo',
            'img.required' => 'Ảnh minh họa không được để trống',
            'img.max' => 'File ảnh quá lớn',
            'desc.required' => 'Mô tả danh mục không được để trống',
            'desc.min' => 'Mô tả ít nhất 30 ký tự'
        ]
    );
    $file = $request->file('img') ;
    $fileName = $file->hashName() ;
    $destinationPath = public_path().'/images/categories';
    $file->move($destinationPath,$fileName);

    $category = Category::create([
        'name' => $request->name,
        'image' => $fileName,
        'description' => $request->desc,
    ]);
    if ($category){
        return redirect()->route('showAllCategory')->with('success','Tạo danh mục thành công');
    }else{
        return redirect()->route('showAllCategory')->with('fail','Tạo danh mục không thành công');

    }
    }
    public function storeCourse(Request $request){
      
        $request->validate([
            'name' => 'required|unique:courses,name|max:255',
            'category' => 'required',
            'price' => 'required',
            'desc' => 'required|min:50|max:255',
            'img' => 'required|max:10000',

        ],
        [
            'name.required' => 'Tên khóa học không được trống',
            'name.unique' => 'Tên khóa học đã được dùng',
            'name.max' => 'Tên khóa học quá dài',
            'category.required' => ' Chưa chọn danh mục cho khóa học',
            'price.required' => 'Giá khóa học không được để trống',
            'price.numeric' => 'Giá tiền phải là số',
            'desc.required' => 'Mô tả khóa học không được để trống',
            'desc.min' => 'Mô tả khóa học ít nhất 50 ký tự',
            'desc.max' => 'Mô tả  khóa học quá dài',
            'img.required' => 'Ảnh minh họa không được để trống',
            'img.max' => 'File ảnh quá lớn',
        ]);
		//dd('validate thanh cong');
		//dd($request->file('img'));
		//exit;
        $file = $request->file('img') ;
        $fileName = $file->hashName() ;
        
        $destinationPath = public_path().'/images/courses';
        $file->move($destinationPath,$fileName);
       
        $course = Course::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'desc' => $request->desc,
            'owner' => Auth::id(),
            'upload_date' => Carbon::now(),
            'image' => $fileName,
        ]);

        if($course){
            return redirect()->route('showAllCourse')->with('success','Thêm khóa học thành công');
        }
        else{
            return redirect()->route('showAllCourse')->with('fail','Thêm khóa học không thành công');
        }
    }

    public function storeLesson($idCourse, Request $request){
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'content' => 'required',
        ],[
            'name.required' => 'Tên chương học không được trống',
            'desc.required' => 'Mô tả chương học không được để trống',
            'content.required' => 'Nội dung chương học không được để trống',
        ]);
        $lesson = Lesson::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'content' => $request->content,
            'upload_date' => Carbon::now(),
            'course_id' => $idCourse,
        ]);
        if($lesson){
            return redirect()->route('showAllLesson',['id' => $idCourse])->with('success','Thêm chương học thành công');
        }else{
            return redirect()->route('showAllLesson',['id' => $idCourse])->with('fail','Thêm chương học không thành công');
        }
    }

    public function showMainPage(){
        $categories = Category::paginate(6);
        $courses = Course::all();
        return view('student-views.main-page',compact('categories','courses'));

    }

    public function searchCourseByNameAndCat(Request $request){
        $courses_searched = Course::join('categories','categories.id','=','courses.category_id')
        ->where('courses.name','like',"%$request->course_name%")
        ->where('categories.id','=',$request->category_id)
        ->get(['courses.*','categories.name as categoryName' ]);
        $categories = Category::paginate(6);
        $courses = Course::all();
        return view('student-views.courses-searched',compact('categories','courses','courses_searched'));
    }

    public function showSingleCourse($idCourse){
        $single_course = Course::find($idCourse);
        $categories = Category::paginate(6);

        return view('student-views.single-course',compact('categories','single_course'));
    }

    public function addToWishList($idCourse){

        $idUser = Auth::id();
        $create = Wishlist::create([
            'course_id' => $idCourse,
            'user_id' => Auth::id()
        ]);
        if($create){
            return redirect()->back()->with("success","Thêm vào yêu thích thành công");

        }
        else return ;
    }

    public function deleteWishItem($id){
        Wishlist::find($id)->delete();
        return redirect()->back()->with("success","Xóa thành công");
    }

}
