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
        // $tasks = Task::orderBy('status', 'asc')->get();
        $tasks=Task::paginate(10);
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

    function deletetask(){
        $task=$_POST["todelete"];
        TaskPriority::where('task','=',$task)->delete();
        Task::where('task','=',$task)->delete();
        return redirect('/');
    }

    function changestatus(){
        $status=$_POST["statusupdate"];
        $task=$_POST["tasktoupdate"];
        $timestamp = date('Y-m-d H:i:s');
        if($status == "Incomplete")
            $timestamp=null;
        Task::where('task','=',$task)->update(['status'=>$status]);
        Task::where('task','=',$task)->update(['Completed'=>$timestamp]);
        return redirect('/');
    }

    function edittask(){
        $priorities = Priority::orderBy('priority', 'asc')->pluck('priority');
        return view('edittask',['priorities'=>$priorities]);
    }
    function taskedited(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name=$_POST["name"];
            $originalname=$_POST["originaltask"];
            $name = trim($name);
            $name = stripslashes($name);
            $name = htmlspecialchars($name);
            print_r($name);
            print_r($originalname);
            $priorities = $_POST["priority"];
            print_r($priorities);
            TaskPriority::where('task','=',$originalname)->delete();
            Task::where('task','=',$originalname)->update(['task'=>$name]);
            foreach ($priorities as $priority){
                $taskpri = new TaskPriority;
                $taskpri->task = $name;
                $taskpri->priority = $priority;
                $taskpri->save();
            }
            return redirect('/');
        }
    }
    function taskview(){
        $priorities = Priority::orderBy('priority', 'asc')->pluck('priority');
        return view('taskview',['priorities'=>$priorities]);
    }
    function returnhome(){
        return redirect('/');
    }
    
}
