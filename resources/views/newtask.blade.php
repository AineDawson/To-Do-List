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
  <!-- <input type="checkbox" id='priority' name="priority" value=$priorities>
    <label>{{ $priorities}}</label><br> -->

  <script>
  @foreach ($priorities as $p)
  // var x=0;
  //   var input = document.createElement("input");
  //   input.type = "checkbox";
  //   input.name= 'priority';
  //   input.id=x;
  //   input.value=x;
  //   var parent = document.getElementById("parentDiv");
  //   parent.appendChild(input);
    @endforeach
  </script>
  
  <select name="priority[]" multiple="multiple" size="5">
  @foreach ($priorities as $p)
    <option value={{$p}}>{{$p}}</option>
  @endforeach


  <!-- <option value="USA">USA</option>
  <option value="Russia">Russia</option>
  <option value="India">India</option>
  <option value="Britain">Britain</option> -->
</select>
  </div>

  <!-- <input type="checkbox" id="urgent" name="priority" value="urgent">
    <label for="urgent">Urgent</label><br>
    <input type="checkbox" id="important" name="priority" value="important">
    <label for="important">Important</label><br>
    <input type="checkbox" id="ignore" name="priority" value="ignore">
    <label for="ignore">Ignore</label><br>
    <input type="checkbox" id="optional" name="priority" value="optional">
    <label for="optional">Optional</label><br> -->
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>
<!-- 
<script>
 function dynamic_field(number)
 {
  html = '<tr>';
        html += '<td><input type="text" name="first_name[]" class="form-control" /></td>';
        html += '<td><input type="text" name="last_name[]" class="form-control" /></td>';
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            $('tbody').html(html);
        }
 }
</script> -->