<?php
// written by lina on Fri Jul 26 11:33:17 SGT 2013

// connect to the database
$con=mysqli_connect("localhost","root","Durianlover","user_logs");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Create table user
$sqlt="CREATE TABLE user
(
username CHAR(30),
firstName CHAR(30),
lastName CHAR(30),
institution CHAR(50),
email CHAR(50),
password CHAR(18),
userID INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(UserID)
)";


// Excute query

if (mysqli_query($con,$sqlt))
  {
  echo "Table user created successfully";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con);
  }

// close connection
mysql_close($con); 

?>
