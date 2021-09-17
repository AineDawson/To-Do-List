<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  


<h2>New Task</h2>
<form method="post" action="taskcreated">  
    @csrf
  Name: <input type="text" name="name" required>
  <br><br>

  <div class="container" id="parentDiv">
  Priorities: <br> 

  <script>
  @foreach ($priorities as $p)
    @endforeach
  </script>
  
  <select name="priority[]" multiple="multiple" size="5" required>
  @foreach ($priorities as $p)
    <option value={{$p}}>{{$p}}</option>
  @endforeach
</select>
  </div>
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>