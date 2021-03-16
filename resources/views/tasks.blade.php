<!doctype html>
<html lang="en">
<style>
table {
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th {
  cursor: pointer;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
</style>

    <head>
        <title>Task List</title>
    </head>
    <body>
        <h1>Task List</h1>
    <div>
        <table id="tasklist" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th onclick="sortTable(0)">Task</th>
                <th onclick="sortTable(1)">Priority</th>
                <th onclick="sortTable(2)">Status</th>
                </tr>
            </thead>
            <tbody>
            @if ($tasks->count() == 0)
                <tr>
                    <td colspan="5">No tasks to display.</td>
                </tr>
            @endif
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
                    <div style="display: none;">{{$task->status}}</div>
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
            </tbody>
        </table>

        {{ $tasks->links() }}

        <p>
            Displaying {{$tasks->count()}} of {{ $tasks->total() }} task(s).
        </p>

    </div>

    <form action="newtask" method="get">
        <button type="submit" class="btn">Create Task</button>
    </form>

    <!-- Bubble Sorting function gotten from  -->
    <!-- https://www.w3schools.com/howto/howto_js_sort_table.asp -->
        <script>
        var dir;
        function sortTable(n) {
            var rows, swapped=true, i, x, y, swap, swapPerformed=false;
            dir = "asc"; 
            rows = document.getElementById("tasklist").rows;
            while (swapped) {
                swapped = false;
                for (i = 1; i < (rows.length - 1); i++) {
                    swap = false;
                    x = rows[i].getElementsByTagName("td")[n];
                    y = rows[i + 1].getElementsByTagName("td")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            swap= true;
                            break;
                        }
                    } else {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            swap = true;
                            break;
                        }
                    }
                }
                if (swap) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    swapped = true; 
                    swapPerformed=true;    
                } else {
                    if (!swapPerformed && dir == "asc") {
                        dir = "desc";
                        swapped = true;
                    }
                }
            }
        }
        </script>

    </body>
</html>


