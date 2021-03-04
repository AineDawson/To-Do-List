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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return "test";
});

//testing retriving data
Route::get('/tasks', function(){
    //$tasks = DB::table('to-do list')->get();
    $tasks = App\models\Task::all();
    return $tasks;
    //return view('to-do-list.index', ['tasks' => $tasks]);
});