<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(StudentController::class)->group(function () {
    Route::get('students', 'index');
    Route::get('filter-students','filterStudents');
    Route::post('students', 'store');
    Route::get('students/create', 'create');

});
Route::controller(CourseController::class)->group(function () {
    Route::get('courses', 'index');
    Route::get('courses/{id}', 'show');
    Route::get('/manage-students/{id}', 'manageStudents');
    Route::post('/store-manage-students/{id}', 'storeManageStudents');

});