<?php

// this mail must be set to receive data from App
$myMail = "angelvittorio@gmail.com";

// this key must be set at App settings, change it for your own key
$myKey = "123654789";

// bbdd password
$con = mysqli_connect("localhost","mdm","***");
if (!$con)
  {
  die('Error: Could not connect: ' . mysqli_error());
  }

mysqli_select_db( $con,"mdm");

?>