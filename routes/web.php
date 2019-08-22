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

/* SNS */
Route::get('/timeline','Auth\TimelineController@showTimelinePage');
Route::post('/timeline','Auth\TimelineController@postTweet');

/* todoリスト */
Route::get('/task', 'Auth\TasklistController@tasklist');
Route::post('/task','Auth\TasklistController@postTasklist');

Route::delete('/task/{task}','Auth\TasklistController@deleteTasklist');
