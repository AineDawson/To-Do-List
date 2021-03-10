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
                        @foreach($taskpriority as $tp)
                        <div>{{$tp}}</div>
                        @endforeach
                    </div>
                </td>
                <td>
                    <div>{{ $task->status }}</div>
                </td>
                <td>
                    <div><button type="button">EDIT</button></div>
                </td>
                <td>
                    <button type="button">DELETE</button>
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