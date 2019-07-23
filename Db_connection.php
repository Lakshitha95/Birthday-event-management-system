<?php
  //Database connection
  $con = mysqli_connect('localhost', 'root', '', 'Class_test');      
  if(!$con) {
    echo "Error: failed to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }

 ?> 