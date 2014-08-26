<?php

$con=mysql_connect("localhost","root","");

// Check connection

// Create database
$sql="CREATE DATABASE testing";
if (mysql_query($con,$sql))
  {
  echo "Database my_db created successfully";
  }
else
  {
  echo "Error creating database: " ;
  }
?>