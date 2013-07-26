<?php
// written by lina on Thu Jul 25 22:47:47 SGT 2013

// connect to the database
$con=mysqli_connect("localhost","root","DrianLover");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// create new database named as user_logs
$dbase="CREATE DATABASE user_logs";

// excuate query

if (mysqli_query($con,$dbase))
  {
  echo "Database user_logs created successfully.
  ";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }

// close connection
mysql_close($con); 


?>
