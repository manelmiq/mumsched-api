<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout');
//Route::post('register', 'Auth\RegisterController@register');

Route::prefix('login')->group(function () {
    Route::post('student', 'StudentsController@login');
    Route::post('admin', 'AdminsController@login');
    Route::post('faculty', 'FacultyController@login');
});



Route::post('logout', 'Auth\LoginController@logout');
Route::post('register', 'Auth\RegisterController@register');




Route::get('articles', 'ArticleController@index');
Route::get('articles/{article}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{article}', 'ArticleController@update');
Route::delete('articles/{article}', 'ArticleController@delete');




Route::get('articles', 'ArticleController@index');
Route::get('articles/{article}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{article}', 'ArticleController@update');
Route::delete('articles/{article}', 'ArticleController@delete');


Route::get('students', 'StudentsController@index');
Route::get('students/{student_id}', 'StudentsController@show');
Route::post('students', 'StudentsController@store');
Route::put('students/{students}', 'StudentsController@update');
Route::delete('students/{student_id}', 'StudentsController@delete');
Route::get('students/{student_id}/blocks', 'StudentsController@getBlocks');
Route::get('students/{student_id}/courses_available', 'StudentsController@getCoursesAvailable');


//=================Course Routes===========================
Route::get('courses', 'CoursesController@index');
Route::get('courses/{course_id}', 'CoursesController@show');
Route::post('courses', 'CoursesController@store');
Route::put('courses/{course_id}', 'CoursesController@update');
Route::delete('courses/{course_id}', 'CoursesController@delete');
Route::get('courses/{course_id}/prerequisites', 'CoursesController@getAllPrerequisites');
Route::get('courses/{course_id}/facultypreferences', 'CoursesController@getFacultyPreferences');

//=================Faculty Routes===========================
Route::get('faculty', 'FacultyController@index');
Route::get('faculty/{faculty_id}', 'FacultyController@show');
Route::post('faculty', 'FacultyController@store');
Route::put('faculty/{faculty_id}', 'FacultyController@update');
Route::delete('faculty/{faculty_id}', 'FacultyController@delete');
Route::get('faculty/{faculty_id}/coursepreferences', 'FacultyController@getCoursePreferences');
Route::put('faculty/{faculty_id}/coursepreferences', 'FacultyController@updateCoursePreferences');
Route::post('faculty/{faculty_id}/coursepreferences', 'FacultyController@storeCoursePreferences');

//=================Blocks Routes===========================
Route::get('blocks', 'BlocksController@index');
Route::get('blocks/{block_id}', 'BlocksController@show');
Route::post('blocks', 'BlocksController@store');
Route::put('blocks/{block_id}', 'BlocksController@update');
Route::delete('blocks/{block_id}', 'BlocksController@delete');

//=================Entries Routes===========================
Route::get('entries', 'EntriesController@index');
Route::get('entries/{entry_id}', 'EntriesController@show');
Route::post('entries', 'EntriesController@store');
Route::put('entries/{entry_id}', 'EntriesController@update');
Route::delete('entries/{entry_id}', 'EntriesController@delete');
Route::get('entries/{entry_id}/students', 'EntriesController@getStudents');

//=================Admins Routes===========================
Route::get('admins', 'AdminsController@index');
Route::get('admins/{admin_id}', 'AdminsController@show');
Route::post('admins', 'AdminsController@store');
Route::put('admins/{admin_id}', 'AdminsController@update');
Route::delete('admins/{admin_id}', 'AdminsController@delete');

//==================== Sections Routes ======================
Route::get('sections', 'SectionsController@index');
Route::get('sections/{section_id}', 'SectionsController@show');
Route::post('sections', 'SectionsController@store');
Route::put('sections/{section_id}', 'SectionsController@update');
Route::delete('sections/{section_id}', 'SectionsController@delete');


//==================== Students Courses Registration Routes ======================
Route::get('registrations', 'StudentCourseRegistrationController@index');
Route::get('registrations/{registration_id}', 'StudentCourseRegistrationController@show');
Route::post('registrations', 'StudentCourseRegistrationController@store');
Route::put('registrations/{registration_id}', 'StudentCourseRegistrationController@update');
Route::delete('registrations/{registration_id}', 'StudentCourseRegistrationController@delete');


//==================== StudentsBlocks  Routes ======================
Route::get('students_blocks', 'StudentBlocksController@index');
Route::get('students_blocks/{block_id}', 'StudentBlocksController@show');
Route::post('students_blocks', 'StudentBlocksController@store');
Route::put('students_blocks/{block_id}', 'StudentBlocksController@update');
Route::delete('students_blocks/{block_id}', 'StudentBlocksController@delete');






//php artisan make:controller PhotoController --resource


Route::group(['middleware' => 'auth:api'], function() {

});
