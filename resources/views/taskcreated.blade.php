<html>
<body>

<?php
// define variables and set to empty values
$name = $priority ="";

//validates the forms
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
//   $priorities = test_input($_POST["priority"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

Welcome <?php echo $_POST["name"]; ?><br>
<?php print_r($_POST); ?>

</body>
</html>