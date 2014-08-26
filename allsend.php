<?php 
require('config.php');

include 'functions.php';



$gethall = mysql_query("SELECT * FROM `admin`");
while($get = mysql_fetch_assoc($gethall)){
$hall = $get['dbname'];
$details = mysql_query("SELECT * FROM `$hall`");
while($row = mysql_fetch_assoc($details)){
$user = $row['uid'];
$pass = $row['pass'];
$email = $row['email'];
$body = "E-voting IITP Gymkana Elections\nUserID:$user\nPassword:$pass";
$sub = "Gymkhana Elections";
$to = $email;
$from = "From: vinoddosapati02@gmail.com";
mail($to,$sub,$body,$from);
}
}

?>