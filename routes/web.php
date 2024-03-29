<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'TaskController@list');

Route::get('/newtask', 'TaskController@newtask');

Route::post('/taskcreated', 'TaskController@taskcreated');

Route::delete('/deletetask', 'TaskController@deletetask');

Route::post('/changestatus','TaskController@changestatus');

Route::post('/edittask','TaskController@edittask');

Route::get('/edittask','TaskController@returnhome');

Route::post('/taskedited','TaskController@taskedited');

Route::post('/taskview','TaskController@taskview');

Route::get('/taskview','TaskController@returnhome');