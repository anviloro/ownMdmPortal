<?php require_once("./init.inc.php"); ?>
<?php

$imei = $_POST["imei"];
$name = trim($_POST["name"]);
 
// update table
  $sql = "UPDATE devices SET `name`='" . $name . "' WHERE imei='" . $imei . "'";
  //echo $sql;
  if (!mysqli_query($con,$sql))
  {
    // error
    echo 'Error update';
  }    
  header("location: /mdm/web/");

?>