<?php require_once("init.inc.php"); ?>
<?php

$imei = $_GET["imei"];
$limit = $_GET["limit"];

header('Content-type: application/json');
header('Content-Type: text/plain; charset=ISO-8859-1');

$sql = "SELECT imei, log, dateLog FROM devices_log where imei = '" . $imei . "' ORDER BY dateLog DESC LIMIT " . $limit; 
     
//echo $sql;

$result = mysqli_query($con,$sql) or die ("Error: query");

if (!$result || mysqli_num_rows($result) <= 0)  {
  echo '{'.PHP_EOL;
  echo '"logs": "0",'.PHP_EOL;
  echo '}'.PHP_EOL;   
}
else {

  $found = 0;
  $indice = 0;

  echo '{'.PHP_EOL;
  echo '"logs": "' . mysqli_num_rows($result) . '",'.PHP_EOL;
  echo '"items": ['.PHP_EOL;

  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
  {                                                                       
    $found = 1;
    $indice++;                             

    $imei = $row['imei'];
    $log = $row['log'];
    $dateLog = $row['dateLog'];
    
    echo '{';
    echo '"imei": "'. $imei . '",'.PHP_EOL;
    echo '"log": "'. $log . '",'.PHP_EOL;
    echo '"dateLog": "'. $dateLog . '"'.PHP_EOL;
    
    if ($indice == mysqli_num_rows($result))
      echo '}'.PHP_EOL;
    else
      echo '},'.PHP_EOL;
           
  }
  echo ']'.PHP_EOL;
  echo '}'.PHP_EOL;  


}

?>