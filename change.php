<?php
  $conn = mysqli_connect("sql2.njit.edu", "cp262", "pmq1HTaX", "cp262") or die(mysqli_error());
  //$conn = mysqli_connect("localhost", "id2473271_user", "pass123", "id2473271_animodules") or die(mysqli_error());
  //echo "Database is working!";
  
  $response = array();
  
  echo (json_encode($response));
?>