<!DOCTYPE HTML>  
<html>
  <style>
table {
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}
th, td {
  text-align: left;
  padding: 16px;
}
</style>
<head>
</head>
<body>  



<?php $task=$_POST["tasktoedit"]; ?>
    @csrf
    <input type="hidden" name="originaltask" value="{{$task}}" >
    <h2>Task Name: {{$task}}</h2>
  
    <table id="tasklist" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Priorities</th>
              <th> Created </th>
              <th> Updated </th>
              <th> Status </th>
</tr>
</thead>
<tbody>
  <tr>
    <td>
      <div>
      <?php $priorities = App\TaskPriority::where('task', $task)->get();?>
  @foreach ($priorities as $p) 
  <div>{{$p->priority}}<div>
    @endforeach
      </div>
</td>
<td>
  <div>
  <?php $created = App\Task::where('task', $task)->get();?>
  @foreach ($created as $ca) 
  {{$ca->created_at}}
    @endforeach
  </div>
</td>
<td>
  <div>
  <?php $updated = App\Task::where('task', $task)->get();?>
  @foreach ($updated as $up) 
  {{$up->updated_at}}
    @endforeach
  </div>
</td>
<td>
  <div>
  <?php $status = App\Task::where('task', $task)->get();?>
  @foreach ($status as $st) 
  {{$st->status}}
    {{$st->Completed}}
    @endforeach
  </div>
</td>
</tr>
</tbody>

<form action="" method="get">
        <button type="submit" class="btn">Back</button>
</form>

<form action="edittask" method="post">
    @csrf
    <input type="hidden" name="tasktoedit" value="{{$task}}" >
    <button type="submit" class="btn">Edit</button>
    </form>

    <form action="deletetask" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="todelete" value="{{$task}}" >
    <button type="submit" class="btn"}>Delete</button>
    </form>

</body>
</html>