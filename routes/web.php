<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CoursesController as CoursesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController as UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'course-management'],function () {
    //show view routes
    Route::get('/showAllCourse',[CoursesController::class, 'showAllCourse'])->name('showAllCourse');
    Route::get('/showAllCategory',[CoursesController::class, 'showAllCategory'])->name('showAllCategory');
    Route::get('/addCategory',[CoursesController::class, 'addCategory'])->name('addCategory');
    Route::get('/addCourse',[CoursesController::class, 'addCourse'])->name('addCourse');
    Route::get('/showAllLesson/{id}',[CoursesController::class, 'showAllLesson'])->name('showAllLesson');
    Route::get('/addLesson/{id}',[CoursesController::class, 'addLesson'])->name('addLesson');
    //store data
    Route::post('/storeCategory', [CoursesController::class, 'storeCategory'])->name('storeCategory');
    Route::post('/storeCourse', [CoursesController::class, 'storeCourse'])->name('storeCourse');
    Route::post('/storeLesson/{idCourse}',[CoursesController::class, 'storeLesson'])->name('storeLesson');
});


Route::group(['prefix' =>'user-management'],function () {
    //show view routes for backend user management
    Route::get('/showAllUser',[UserController::class, 'showAllUser'])->name('showAllUser');
    Route::get('/showUserProfile',[UserController::class, 'showUserProfile'])->name('showUserProfile');
    Route::get('/showEditProfile',[UserController::class, 'showEditProfile'])->name('showEditProfile');
    Route::get('/showChangePassword',[UserController::class, 'showChangePassword'])->name('showChangePassword');
    // actions on user
    Route::get('/lockUser/{id}',[UserController::class, 'lockUser'])->name('lockUser');
    Route::get('/unlockUser/{id}',[UserController::class, 'unlockUser'])->name('unlockUser');
    Route::get('/resetPassword/{id}',[UserController::class, 'resetPassword'])->name('resetPassword');
    // edit profile
    Route::post('/EditProfile',[UserController::class, 'editProfile'])->name('EditProfile');
    //store change password
    Route::post('/storeChangePassword',[UserController::class, 'storeChangePassword'])->name('storeChangePassword');
});

Route::group(['prefix' => 'student-site'],function () {
    Route::get('/',[CoursesController::class, 'showMainPage'])->name('showMainPage');
    Route::get('/showLoginStudent',[UserController::class, 'showLoginStudent'])->name('showLoginStudent');
    Route::get('/showRegisterStudent',[UserController::class, 'showRegisterStudent'])->name('showRegisterStudent');
    Route::get('/logout',[UserController::class, 'MyLogout'])->name('myLogout');
    Route::get('/showSingleCourse/{idCourse}',[CoursesController::class, 'showSingleCourse'])->name('showSingleCourse');
    Route::get('/addToWishList/{idCourse}',[CoursesController::class,'addToWishList'])->name('addToWishList');
    Route::get('/MyAccount',[UserController::class, 'MyAccount'])->name('MyAccount');
    Route::get('/delete-wish-item/{id}',[CoursesController::class, 'deleteWishItem'])->name('deleteWishItem');

    // Route::get('/')
    Route::get('success',[PaymentController::class, 'success'])->name('success');
    Route::get('error',[PaymentController::class, 'error'])->name('error');

    Route::post('/studentLogin',[UserController::class, 'studentLogin'])->name('studentLogin')->middleware('studentLoginValidate');
    Route::post('/studentRegister',[UserController::class, 'studentRegister'])->name('studentRegister');
    Route::post('/searchCourseByNameAndCat',[CoursesController::class, 'searchCourseByNameAndCat'])->name('searchCourseByNameAndCat');
    Route::post('/pay',[PaymentController::class, 'pay'])->name('pay');
});
