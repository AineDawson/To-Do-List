<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  


<h2>Edit Task</h2>
<?php $task=$_POST["tasktoedit"]; ?>
<form method="post" action="taskedited">  
    @csrf
    <input type="hidden" name="originaltask" value="{{$task}}" >
  Name: <input type="text" name="name" value="{{$task}}" required>
  <br><br>

  <div class="container" id="parentDiv">
  Priorities: <br> 

  <script>
  @foreach ($priorities as $p)
    @endforeach
  </script>
  
  <select name="priority[]" multiple="multiple" size="5">
  @foreach ($priorities as $p)
  <?php $taskspriorities = App\TaskPriority::where('task','=', $task)->where('priority','=',$p)->exists();
  if($taskspriorities){ ?>
    <option value={{$p}} selected>{{$p}}</option>
    <?php }else{ ?>
    <option value={{$p}}>{{$p}}</option>
    <?php }?>?>

  @endforeach
</select>
  </div>
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>