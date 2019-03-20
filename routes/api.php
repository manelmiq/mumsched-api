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

//=================Logins Routes===========================
Route::prefix('login')->group(function () {
    Route::post('student', 'StudentsController@login');
    Route::post('admin', 'AdminsController@login');
    Route::post('faculty', 'FacultyController@login');
});

//=================Students Routes===========================
Route::get('students', 'StudentsController@index');
Route::get('students/{students}', 'StudentsController@show');
Route::post('students', 'StudentsController@store');
Route::put('students/{students}', 'StudentsController@update');
Route::delete('students/{students}', 'StudentsController@delete');
Route::get('students/{students}/blocks', 'StudentsController@getBlocks');
Route::get('students/{student}/all_blocks', 'StudentsController@getAllBlocks');
Route::put('students/{student}/all_blocks', 'StudentsController@updateAllBlocks');
Route::get('students/{students}/courses_available', 'StudentsController@getCoursesAvailable');
Route::get('students/{student}/schedule', 'StudentsController@getSchedule');

//=================Course Routes===========================
Route::get('courses', 'CoursesController@index');
Route::get('courses/{course}', 'CoursesController@show');
Route::post('courses', 'CoursesController@store');
Route::put('courses/{course}', 'CoursesController@update');
Route::delete('courses/{course}', 'CoursesController@delete');
Route::get('courses/{course}/prerequisites', 'CoursesController@getAllPrerequisites');

//=================Faculty Routes===========================
Route::get('faculty', 'FacultyController@index');
Route::get('faculty/{faculty}', 'FacultyController@show');
Route::post('faculty', 'FacultyController@store');
Route::put('faculty/{faculty}', 'FacultyController@update');
Route::delete('faculty/{faculty}', 'FacultyController@delete');
Route::get('faculty/{faculty}/coursepreferences', 'FacultyController@getCoursePreferences');
Route::put('faculty/{faculty}/coursepreferences', 'FacultyController@updateCoursePreferences');
Route::post('faculty/{faculty}/coursepreferences', 'FacultyController@storeCoursePreferences');
Route::get('faculty/{faculty}/blockpreferences', 'FacultyController@getBlockPreferences');
Route::put('faculty/{faculty}/blockpreferences', 'FacultyController@updateBlockPreferences');
Route::post('faculty/{faculty}/blockpreferences', 'FacultyController@storeBlockPreferences');
Route::get('faculty/{faculty}/

es', 'FacultyController@getCoursesScheduled');

//=================Blocks Routes===========================
Route::get('blocks', 'BlocksController@index');
Route::get('blocks/{block}', 'BlocksController@show');
Route::post('blocks', 'BlocksController@store');
Route::put('blocks/{block}', 'BlocksController@update');
Route::delete('blocks/{block}', 'BlocksController@delete');

//=================Entries Routes===========================
Route::get('entries', 'EntriesController@index');
Route::get('entries/{entry}', 'EntriesController@show');
Route::post('entries', 'EntriesController@store');
Route::put('entries/{entry}', 'EntriesController@update');
Route::delete('entries/{entry}', 'EntriesController@delete');
Route::get('entries/{entry}/students', 'EntriesController@getStudents');

//=================Admins Routes===========================
Route::get('admins', 'AdminsController@index');
Route::get('admins/{admin}', 'AdminsController@show');
Route::post('admins', 'AdminsController@store');
Route::put('admins/{admin}', 'AdminsController@update');
Route::delete('admins/{admin}', 'AdminsController@delete');

//==================== Sections Routes ======================
Route::get('sections', 'SectionsController@index');
Route::get('sections/{sections}', 'SectionsController@show');
Route::post('sections', 'SectionsController@store');
Route::put('sections/{sections}', 'SectionsController@update');
Route::delete('sections/{sections}', 'SectionsController@delete');

//==================== Students Courses Registration Routes ======================
Route::get('registrations', 'StudentCourseRegistrationController@index');
Route::get('registrations/{registration}', 'StudentCourseRegistrationController@show');
Route::post('registrations', 'StudentCourseRegistrationController@store');
Route::put('registrations/{registrations}', 'StudentCourseRegistrationController@update');
Route::delete('registrations/{registration}', 'StudentCourseRegistrationController@delete');

//==================== StudentsBlocks  Routes ======================
Route::get('students_blocks', 'StudentBlocksController@index');
Route::get('students_blocks/{blocks}', 'StudentBlocksController@show');
Route::post('students_blocks', 'StudentBlocksController@store');
Route::put('students_blocks/{blocks}', 'StudentBlocksController@update');
Route::delete('students_blocks/{blocks}', 'StudentBlocksController@delete');

