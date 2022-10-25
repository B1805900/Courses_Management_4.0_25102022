<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
class UserController extends Controller
{
    //Backend User
    public function showAllUser(){
        $users = User::paginate(10);
        return view('admin.user-list',compact('users'));

    }
    public function showUserProfile(){
        return view('backend-user-views.user-profile');
    }
    public function showEditProfile(){
        return view('backend-user-views.edit-profile');
    }
    public function showChangePassword(){
        return view('backend-user-views.change-password');
    }

    public function lockUser($id){
        User::find($id)->update(['status' => 2]);
        return redirect()->route('showAllUser')->with('success','Khóa người dùng thành công');
    }
    public function unlockUser($id){
        User::find($id)->update(['status' => 1]);
        return redirect()->route('showAllUser')->with('success','Mở khóa người dùng thành công');
    }
    public function resetPassword($id){
        User::find($id)->update(['password' => Hash::make(12345678)
    ]);
        return redirect()->route('showAllUser')->with('success','Reset mật khẩu người dùng thành công, mật khẩu mới là \'12345678\'');
    }

    // EditProfile User
    public function editProfile(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.Auth::user()->id,
            'phone' => ['required','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
        ],[
            'name.required' => 'Tên người dùng không được để trống',
            'email.required' => 'Email dùng không được để trống',
            'email.unique' => 'Email đã được sử dụng',

            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
        ]);
        if($request->avatar != null){
            $file = $request->file('avatar') ;
            $fileName = $file->hashName() ;
            $destinationPath = public_path().'/images/avatar';
            $file->move($destinationPath,$fileName);
        }
        User::find(Auth::user()->id)->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'avatar' => $fileName,
            'update_at' => Carbon::now(),
        ]);
        return redirect()->route('showUserProfile')->with('success','Cập nhật thông tin thành công');

    }

    public function storeChangePassword(Request $request){

        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error_old_pass","Mật khẩu cũ không đúng");
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed|different:current_password',

        ],[
            'current_password.required' =>'Mật khẩu cũ không được để trống',
            'new_password.required' =>'Mật khẩu mới không được để trống',
            'new_password.min' =>'Mật khẩu có ít nhất 8 ký tự',
            'new_password.confirmed' =>'Xác nhận mật khẩu không đúng',
            'new_password.different' =>'Mật khẩu mới không được trùng với mật khẩu cũ'
        ]

    );
        User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back()->with("success","Đổi mật khẩu thành công!");

    }
    // Frontend User
    public function showLoginStudent(){
        return view('student-views.login');
    }
    public function showRegisterStudent(){
        return view('student-views.register');

    }
    public function studentLogin(Request $request){
        $request->validate([
            'email' =>'required',
            'password' =>'required|min:8'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu'
        ]);
        $credentials = $request->except(['_token']);

        if(auth()->check() && (auth()->user()->status == 2)){
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('back')->with('error','Tài khoản của bạn đã bị khóa, Hãy liên hệ admin');
        }else if (auth()->attempt($credentials) && (auth()->user()->id_role == 3)) {

            return redirect()->route('showMainPage');

        }else{

            return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function studentRegister(Request $request){

        $request->validate([
            'name' => 'required',
            'email' =>'required',
            'password' =>'required|min:8|confirmed'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu cần nhập ít nhất 8 ký tự',
            'password.confirmed' => 'Nhập lại mật khẩu không đúng',
            'name.required' => 'Bạn chưa nhập tên tên'
        ]);


        $user = User::create([
            'name' => $request->name,
            'id_role' => 3,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => time(),
        ]);
        if($user){
            return redirect()->route('showLoginStudent')->with('success', 'Tạo tài khoản thành công, hãy đăng nhập để tiếp tục');
        }else{
            return redirect()->back()->with('error','Tạo tài khoản không thành công');
        }
    }

    public function MyLogout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('showMainPage');
    }

    public function MyAccount(){
        $wishListItems = Wishlist::where('user_id', '=',Auth::id())->get();

        return view('student-views.account',compact('wishListItems'));
    }

}
