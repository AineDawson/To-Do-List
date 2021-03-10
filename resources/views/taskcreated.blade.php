<html>
<body>

<?php
// define variables and set to empty values
$name  ="";

//validates the forms
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $priorities = $_POST["priority"];
  newtask($name);
  foreach ($priorities as $p){
      newtaskpriority($name, $p);
  }
    
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function newtask($name){
    $task = new App\Task;
    $task->task = $name;
    $task->status = 'Incomplete';
    $task->save();
}
function newtaskpriority($name, $priority){
    $taskpri = new App\TaskPriority;
    $taskpri->task = $name;
    $taskpri->priority = $priority;
    $taskpri->save();
}
?>

Welcome <?php echo $_POST["name"]; ?><br>
<?php print_r($_POST); ?>

</body>
</html>