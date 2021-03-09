

<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  


<h2>New Task</h2>
<form method="post" action="testingpost2">  
    @csrf
  Name: <input type="text" name="name" required>
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>
