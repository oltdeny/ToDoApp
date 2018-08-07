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

use Illuminate\Http\Request;

Route::post('/task', 'TaskController@addTask');

Route::delete('/task/{task}', 'TaskController@deleteTask');

Route::post('/update/{task}', 'TaskController@editTask');

Route::post('/complete/{task}', 'TaskController@completeTask');

Auth::routes();

Route::get('/home', function () {
    return view('home');
});

Route::get('/', 'HomeController@index')->name('home');

