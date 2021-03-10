<?php

namespace App\Http\Controllers;
use App\Task;
use App\TaskPriority;
use App\Priority;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    //displays the main task list
    function list(){
        $tasks = Task::orderBy('created_at', 'asc')->get();
        $taskpriority = TaskPriority::orderBy('task', 'asc')->get();
        return view('tasks', [
            'tasks' => $tasks,
            'taskpriority'=>$taskpriority
        ]);
    }

    //opens new page for creation of tasks
    function newtask(){
        $priorities = Priority::orderBy('priority', 'asc')->pluck('priority');
        return view('newtask',['priorities'=>$priorities]);
    }

    //creates a new task
    function taskcreated(){
        //validates the forms
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //security?
            $name=$_POST["name"];
            $name = trim($name);
            $name = stripslashes($name);
            $name = htmlspecialchars($name);
            $priorities = $_POST["priority"];
            $newtask = new Task;
            $newtask->task = $name;
            $newtask->status = 'Incomplete';
            $newtask->save();
            foreach ($priorities as $priority){
                $taskpri = new TaskPriority;
                $taskpri->task = $name;
                $taskpri->priority = $priority;
                $taskpri->save();
            }
            return redirect('/');
        }
    }
}
