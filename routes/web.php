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

//testing creation of tasks
Route::get('/test', function(){
    return view('taskcreator');
});
Route::get('/testing', function(){
    return view('testing');
});

//Success, need to add <php></php>
Route::get('/testingpost', function(){
    return view('testingpost');
});
Route::post('/testingpost2', function(){
    return view('testingpost2');
});


//for testing validation methods
Route::get( '/validation', function(){
    return view('validation');
});


//testing retriving data
Route::get('/tasks', function(){
    //$tasks = DB::table('to-do list')->get();
    $tasks = App\Task::all();
    return $tasks;
    //return view('to-do-list.index', ['tasks' => $tasks]);
});

Route::get('/alltasks', 'TaskController@taskfetch');

Route::get('/', 'TaskController@list');

// Route::get('/newtask', 'TaskController@newtask');

//for retrieving all tasks
// Route::get('/', function(){
//     $tasks = App\Task::orderBy('created_at', 'asc')->get();
//     $taskpriority = App\TaskPriority::orderBy('task', 'asc')->get();
//     return view('tasks', [
//         'tasks' => $tasks,
//         'taskpriority'=>$taskpriority
//     ]);
// });

Route::get('/newtask', function(){
    $priorities = App\Priority::orderBy('priority', 'asc')->pluck('priority');
    return view('newtask',['priorities'=>$priorities]);
});



Route::post('/taskcreated', function(Request $request){
    // $validator = Validator::make($request->all(), [
    //     'name' => 'required|max:255',
    // ]);

    // if ($validator->fails()) {
    //     return redirect('/')
    //         ->withInput()
    //         ->withErrors($validator);
    // }

    $task = new App\Task;
    $task->task = $request;
    $task->status = 'Incomplete';
    $task->save();
    return view('taskcreated');
});

//for posting new tasks
Route::post('/task', function (Request $request) {
    // $validator = Validator::make($request->all(), [
    //     'name' => 'required|max:255',
    // ]);

    // if ($validator->fails()) {
    //     return redirect('/')
    //         ->withInput()
    //         ->withErrors($validator);
    // }

    // $task = new Task;
    // $task->name = $request->name;
    // $task->save();

    // return redirect('/');
});

//for deleting tasks
Route::delete('/task/{id}', function($id){
    //
});