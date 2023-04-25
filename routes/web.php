<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middlewares\RoleMiddleware;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', function (){
    $role = auth()->user()->roles->pluck('name')->first();
    if ($role == 'super-admin'){
        return redirect()->route('super-admin.index');
    }else if($role == 'teacher'){
        return redirect()->route('teacher.index');
    }else if ($role == 'student'){
        return redirect()->route('student.index');
    }
});

Route::group(['middleware' => ['auth', RoleMiddleware::class .':super-admin']], function(){
    Route::resource('/super-admin/users', UserController::class);
    Route::resource('/super-admin/subjects', SubjectController::class);
    Route::resource('/super-admin', SuperAdminController::class);

});




Route::group(['middleware' => ['auth', RoleMiddleware::class .':teacher']], function(){
    Route::resource('/teacher', TeacherController::class);
    Route::resource('/teacher/grades', GradeController::class);
});

Route::group(['middleware' => ['auth', RoleMiddleware::class .':student']], function(){
    Route::resource('/student', StudentController::class);
});
