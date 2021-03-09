<?php

namespace App\Http\Controllers;
use App\Task;
use App\TaskPriority;
use App\Priority;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function taskfetch()
    {
        $tasks = Task::all();
        return $tasks;
    }

    function list(){
        $tasks = Task::orderBy('created_at', 'asc')->get();
        $taskpriority = TaskPriority::orderBy('task', 'asc')->pluck('priority');
        foreach( $taskpriority as $tp){
            $result= $tp;
            print_r($result);
        }
        return view('tasks', [
            'tasks' => $tasks,
            'taskpriority'=>$taskpriority
        ]);
    }

    function newtask(){
        $priority = Priority::orderBy('priority', 'asc')->pluck('priority');
        foreach( $priority as $p){
            $result= $p;
            echo $result;
        }
        return view('createnewtask', ['priority'=>$priority]);
    }

    function createtask(){
        Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});
    }
}
