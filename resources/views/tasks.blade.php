<!doctype html>
<html lang="en">
    <head>
        <title>Task List</title>
    </head>
    <body>
        <h1>Task List</h1>
    </body>

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
                    <div>{{ $task->name }}</div>
                </td>
                <td>
                    <div>{{ $task->priority }}</div>
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
    <div>
        <button type="button">Create Task</button>
    </div>
</html>