<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('selected_courses', 'CoursesController@index')->name('selected_courses');
Route::post('selected_courses', 'CoursesController@save')->name('selected_courses.save')->middleware('auth');
Route::post('selected_courses/saveimages', 'CoursesController@saveImages')->name('selected_courses.saveImages')->middleware('auth');
Route::post('courses/{course}', 'CoursesController@store')->name('selected_courses.store');
Route::delete('courses/{course}', 'CoursesController@remove')->name('selected_courses.remove');

Route::get('/courses', 'HomeController@courses')->name('courses');
Route::get('/courses/{course}', 'HomeController@showCourse')->name('courses.show');

Route::get('universities', 'HomeController@universities')->name('universities');
Route::get('/universities/{university}', 'HomeController@showUniversity')->name('universities.show');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::resource('roles', 'Admin\RoleController')->except(['show']);
    Route::resource('universities', 'Admin\UniversityController')->except(['show']);
    Route::resource('courses', 'Admin\CourseController')->except(['show']);
    Route::resource('course_types', 'Admin\CourseTypeController')->except(['show', 'edit', 'create']);
    Route::resource('categories', 'Admin\CategoryController')->except(['show', 'edit', 'create']);

    Route::resource('users', 'Admin\UserController')->except(['show', 'create', 'store']);

    Route::get('students', 'Admin\StudentsController@index')->name('students.index');
    Route::get('students/{student}', 'Admin\StudentsController@show')->name('students.show');
    Route::get('students/{student}/pdf', 'Admin\StudentsController@exportUserPDF')->name('students.pdf');

});


