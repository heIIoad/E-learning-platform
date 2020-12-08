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
    if (Auth::user())
        return redirect('/home');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('courses', 'CourseController')->middleware('auth');

Route::get('/courses/{courseID}/create', 'PostsController@create')->middleware('auth')->name('posts.create');
Route::any('/courses/{courseID}', 'PostsController@store')->middleware('auth')->name('posts.store');
Route::get('/courses/{courseID}/{id}', 'PostsController@show')->middleware('auth')->name('posts.show');
Route::get('/courses/{courseID}/{id}/edit', 'PostsController@edit')->middleware('auth')->name('posts.edit');
Route::delete('/courses/{courseID}/{id}', 'PostsController@destroy')->middleware('auth')->name('posts.destroy');
Route::put('/courses/{courseID}/{id}', 'PostsController@update')->middleware('auth')->name('posts.update');

Route::get('/participant/{courseID}', 'CourseController@AddToParticipantList')->middleware('auth')->name('course.addParticipant');
Route::get('/participant/{courseID}/remove', 'CourseController@RemoveFromParticipantList')->middleware('auth')->name('course.removeParticipant');
Route::get('/participants/{courseID}/list', 'CourseController@participantList')->middleware('auth')->name('course.participantList');
