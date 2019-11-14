<?php

  $servername = "127.0.0.1";
  $username = "root";
  $passwd = "12345678";
  $dbname = "employee_management";

  $conn = new mysqli($servername,$username,$passwd,$dbname);
  if($conn->connect_error){
    die("Connection failed : " . $conn->connect_error);
  }
  else{
	  #echo 'succesfull';
  }

?>

