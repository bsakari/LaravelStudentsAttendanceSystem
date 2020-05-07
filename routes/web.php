<?php

use Illuminate\Support\Facades\Route;
//export PATH=~/.local/bin:$PATH
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
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('admin');
Auth::routes();

Route::group(['middleware'=>'superadmin'], function(){
    Route::get('/superadmin', function(){
        return view('admin.index');
    });
    Route::resource('/admin/users', 'AdminUsersController');
});

Route::group(['middleware'=>'admin'], function(){
    Route::get('/admin','AdminDashboardController@index');
    Route::resource('/admin/roles', 'AdminRolesController');
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/lecturers', 'AdminLecturersController');
    Route::resource('/admin/courses', 'AdminCoursesController');
    Route::resource('/admin/actions', 'AdminActionsController');
});

Route::group(['middleware'=>'lecturer'], function(){
    Route::resource('/lecturer','LecturerDashboardController');
    Route::resource('/lecturer/check/lec_check_attendance', 'LecturerAttendanceController');
    Route::get('/lecturer/check/{id}', 'LecturerAttendanceController@show');
});

Route::group(['middleware'=>'student'], function(){
    Route::get('/student','StudentDashboardController@index');
    Route::resource('/student/attendance', 'StudentAttendController');
});




