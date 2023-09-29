<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return redirect('students');
});
Route::resource('students', StudentController::class);
Route::get('/confirm-delete/{id}', 'StudentController@confirmDelete')->name('confirmDelete');
Route::get('/filter-students', 'StudentController@filterStudents')->name('filter.students');
Route::resource('courses', 'CourseController');
Route::get('/manage-students/{id}', 'CourseController@manageStudents')->name('manage.students');
Route::post('/store-manage-students/{id}', 'CourseController@storeManageStudents')->name('store.manage.students');


