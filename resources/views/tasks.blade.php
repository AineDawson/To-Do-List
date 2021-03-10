<!doctype html>
<html lang="en">
    <head>
        <title>Task List</title>
    </head>
    <body>
        <h1>Task List</h1>
    <div>
        <table>
            <tr>
                <td>Task</td>
                <td>Priority</td>
                <td>Status</td>
            </tr>
            @foreach ($tasks as $task)
            <tr>
                <td>
                    <div>{{ $task->task }}</div>
                </td>
                <td>
                    <div>
                        <?php $priorities = App\TaskPriority::where('task', $task->task)
                            ->get();?>
                        @foreach($priorities as $tp)
                        <div>{{$tp->priority}}</div>
                        @endforeach
                    </div>
                </td>
                <td>
                    <form action="changestatus" method="post">
                            @csrf
                            <?php $newstatus=''; 
                                if($task->status == 'Incomplete'){
                                    $newstatus='Complete';
                                }else{
                                    $newstatus='Incomplete';
                                }
                                $tasktoupdate=$task->task;
                                ?>
                            <input type="hidden" name="tasktoupdate" value="{{$tasktoupdate}}" >
                            <input type="hidden" name="statusupdate" value="{{$newstatus}}" >
                            <button type="submit" class="btn"}>{{$task->status}}</button>
                        </form>
                </td>
                <td>
                    <form action="edittask" method="post">
                    @csrf
                        <input type="hidden" name="tasktoedit" value="{{$tasktoupdate}}" >
                        <button type="submit" class="btn">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="deletetask" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <?php $tasktodelete=$task->task; ?>
                        <input type="hidden" name="todelete" value="{{$tasktodelete}}" >
                        <button type="submit" class="btn"}>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <form action="newtask" method="get">
        <button type="submit" class="btn">Create Task</button>
    </form>

    </body>
</html>

