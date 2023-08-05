<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ManagmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// AdminController
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    //User list
    Route::get('/admin/userlist', [AdminController::class, 'AdminUserlist'])->name('admin.userlist');
    // Route::get('/admin/adduser', [AdminController::class, 'AdminAdduser'])->name('admin.adduser');
    // Route::post('/admin/add/user', [AdminController::class, 'AdminAddstore'])->name('admin.addstore');


    //Student Controller
    Route::get('/student/index', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
    Route::post('/student/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('/student/show', [StudentController::class, 'show'])->name('student.show');
    Route::post('/student/show', [StudentController::class, 'show'])->name('student.show');
    Route::post('/student/destroy', [StudentController::class, 'destroy'])->name('student.destroy');

    //Admission Year Controller
    Route::controller(YearController::class)->group(function(){
        Route::get('/admission_year/index', 'index')->name('year.index');
        Route::get('/admission_year/create', 'create')->name('year.create');
        Route::post('/admission_year/store', 'store')->name('year.store');
        Route::get('/admission_year/edit/{id}', 'edit')->name('year.edit');
        Route::post('/admission_year/update/{id}', 'update')->name('year.update');
        // Route::get('/admission_year/show', 'show')->name('year.show');
        Route::get('/admission_year/destroy/{id}', 'destroy')->name('year.destroy');
    });

    //Admission Course Controller
    Route::controller(CourseController::class)->group(function(){
        Route::get('/admission_course/index', 'index')->name('course.index');
        Route::get('/admission_course/create', 'create')->name('course.create');
        Route::post('/admission_course/store', 'store')->name('course.store');
        Route::get('/admission_course/edit/{id}', 'edit')->name('course.edit');
        Route::post('/admission_course/update/{id}', 'update')->name('course.update');
        // Route::get('/admission_course/show', 'show')->name('course.show');
        Route::get('/admission_course/destroy/{id}', 'destroy')->name('course.destroy');
    });


    //Singl Data Delete Route
    Route::get('/product/delete/{id}', [ProductController::class, 'singdestroy'])->name('product.singdestroy');
    //Multiple Data Delete Route
    Route::post('/product/alldestroy', [ProductController::class, 'alldestroy'])->name('product.alldestroy');

    //Singl Data and Photo Edit Route
    Route::get('/product/edit_product/{id}', [ProductController::class, 'edit_product'])->name('edit.product');
    Route::post('/product/update_product/{id}', [ProductController::class, 'update_product'])->name('update.product');
    //Delete Data nad Photo Route
    Route::get('/product/delete_product/{id}', [ProductController::class, 'delete_product'])->name('delete.product');



    Route::resource('/product', ProductController::class);

});//Admin Controller end routes


//ManagmentController

Route::middleware(['auth', 'role:managment'])->group(function(){
    Route::get('/managment/dashboard', [ManagmentController::class, 'ManagmentDashboard'])->name('managment.dashboard');

});// End Group managment Middleware


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


// php artisan optimize
