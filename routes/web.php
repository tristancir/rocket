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
    return view('home');
});


Route::get('/feed', 'FeedItemController@index');
Route::get('/feed/offset/{offset}', 'FeedItemController@index2');
Route::get('/feed/filter/{filter}/offset/{offset}', 'FeedItemController@index');


Route::get('/judge', 'JudgeController@index');