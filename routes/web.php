<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('courses', 'CourseController')->middleware('auth');

Route::get('/courses/{courseID}/create', 'PostsController@create')->middleware('auth')->name('posts.create');
Route::any('/courses/{courseID}', 'PostsController@store')->middleware('auth')->name('posts.store');
Route::get('/courses/{courseID}/{id}', 'PostsController@show')->middleware('auth')->name('posts.show');

Route::get('/participant/{courseID}', 'CourseController@AddToParticipantList')->middleware('auth')->name('course.addParticipant');
