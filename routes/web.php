<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\User\StudentController as UserStudentController;
use App\Http\Controllers\Admin\CollegeController as AdminCollegeController;
use App\Http\Controllers\User\CollegeController as UserCollegeController;

use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\User\CourseController as UserCourseController;


use Illuminate\Support\Facades\Route;

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
//
// Route::resource('/students',StudentController::class);
// //
// Route::get('/students/{student}',[StudentController::class, 'show'])->name('students.show');

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

Route::resource('/admin/student', AdminStudentController::class)->middleware(['auth'])->names('admin.students');
Route::resource('/user/student', UserStudentController::class)->middleware(['auth'])->names('user.students')->only(['index','show']);

Route::resource('/admin/colleges', AdminCollegeController::class)->middleware(['auth'])->names('admin.colleges');
Route::resource('/user/colleges', UserCollegeController::class)->middleware(['auth'])->names('user.colleges')->only(['index','show']);

Route::resource('/admin/courses', AdminCourseController::class)->middleware(['auth'])->names('admin.courses');
Route::resource('/user/courses', UserCourseController::class)->middleware(['auth'])->names('user.courses')->only(['index', 'show']);



require __DIR__.'/auth.php';
