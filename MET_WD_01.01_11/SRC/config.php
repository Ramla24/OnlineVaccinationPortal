<?php
  $servername = "localhost";
  $username = "root";
  $password ="";
  $database = "vaccine_portal";
 
  
  $conn = new mysqli($servername,$username,$password,$database);

  
  if (mysqli_connect_error())
  {
	  die('connect Error('. mysqli_connect_error().')'.mysqli_connect_error());
	  echo "failed to connect";
	  
  }
?>