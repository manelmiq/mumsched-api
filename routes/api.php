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

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('register', 'Auth\RegisterController@register');

Route::get('articles', 'ArticleController@index');
Route::get('articles/{article}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{article}', 'ArticleController@update');
Route::delete('articles/{article}', 'ArticleController@delete');



Route::get('students', 'StudentsController@index');
Route::get('students/{students}', 'StudentsController@show');
Route::post('students', 'StudentsController@store');
Route::put('students/{students}', 'StudentsController@update');
Route::delete('students/{students}', 'StudentsController@delete');

//=================Course Routes===========================
Route::get('courses', 'CoursesController@index');
Route::get('courses/{course}', 'CoursesController@show');
Route::post('courses', 'CoursesController@store');
Route::put('courses/{course}', 'CoursesController@update');
Route::delete('courses/{course}', 'CoursesController@delete');

//=================Faculty Routes===========================
Route::get('faculty', 'FacultyController@index');
Route::get('faculty/{faculty}', 'FacultyController@show');
Route::post('faculty', 'FacultyController@store');
Route::put('faculty/{faculty}', 'FacultyController@update');
Route::delete('faculty/{faculty}', 'FacultyController@delete');

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


//php artisan make:controller PhotoController --resource


Route::group(['middleware' => 'auth:api'], function() {

});
