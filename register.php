<?php require_once("web/init.inc.php"); ?>
 
<?php 
 
  // comprobar si ya est� registrado el imei

  $key = $_POST["key"];
  $imei = $_POST["imei"];
  $regId = $_POST["regId"]; 
  $model = $_POST["model"]; 

  if ($key == '' || $key == null) {
      die ("NO key");
  }
  if ($key != $myKey) {
      die ("NO valid key");
  }

  $sql = "SELECT imei FROM devices WHERE imei='" . $imei . "'";
  
  echo $sql;
  echo '<br>';
  
  $result = mysqli_query( $con,$sql) or die ("Error: query");
  
  $found = 0;
  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
    $found = 1;                             
  }
  
  if ($found == 0) {
    $sql = "INSERT INTO devices (`imei`, `gcm`, `location`, `enabled`, `model`, `enabledDate`, `disabledDate`) VALUES ('" . $imei . "', '" . $regId . "', NULL, 0, '" . $model . "', NULL, NULL)";

    echo $sql;
    echo '<br>';

    if (!mysqli_query($con,$sql))
    {
      // error
      echo 'Error insert';
    }    
    
  }
  else { // actualizar regid
    $sql = "UPDATE devices SET `gcm`='" . $regId . "', `model`='" . $model . "' WHERE imei='" . $imei . "'";
    echo $sql;
    echo '<br>';

    if (!mysqli_query($con,$sql))
    {
      // error
      echo 'Error update';
    }    
    
    $sql = "INSERT INTO devices_log(`imei`,`log`) VALUES ('" . $imei . "', 'registered')";
    echo $sql;
    echo '<br>';

    if (!mysqli_query($con,$sql))
    {
      // error
      echo 'Error insert';
    }    
    
  
  
  
  }

?>
