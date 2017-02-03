<?php require_once("web/init.inc.php"); ?>
 
<?php 
 
  // comprobar si ya est� registrado el imei

  $key = $_POST["key"];
  $imei = $_POST["imei"];
  $message = $_POST["message"]; 

  if ($key == '' || $key == null) {
      die ("NO key");
  }
  if ($key != $myKey) {
      die ("NO valid key");
  }
  
  if ($message == '' || $message == null) {
      echo 'NO data';
  }
  else {

    $sql = "SELECT imei FROM devices WHERE imei='" . $imei . "'";
    
    echo $sql;
    echo '<br>';
    
    $result = mysqli_query($con,$sql) or die ("Error: query");
    
    $found = 0;
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
      $found = 1;                             
    }
    
    if ($found == 0) {
        echo 'Not found';
    }
    else { // actualizar regid
      $sql = "INSERT INTO devices_log(`imei`,`log`) VALUES ('" . $imei . "', '" . $message . "')";
      echo $sql;
      echo '<br>';
  
      if (!mysqli_query($con,$sql))
      {
        // error
        echo 'Error insert';
      }    
    
    }
  }

?>
 
