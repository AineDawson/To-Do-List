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

Route::get('/welcome', function () {
    return view('welcome');
});
//for retrieving all tasks
Route::get('/test', function(){
    return view('test');
});

//testing retriving data
Route::get('/tasks', function(){
    //$tasks = DB::table('to-do list')->get();
    $tasks = App\Task::all();
    return $tasks;
    //return view('to-do-list.index', ['tasks' => $tasks]);
});

Route::get('/alltasks', 'TaskController@taskfetch');

//for retrieving all tasks
Route::get('/', function(){
    $tasks = App\Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

//for posting new tasks
Route::post('/task', function(Request $request){
    //
});

//for deleting tasks
Route::delete('/task/{id}', function($id){
    //
});