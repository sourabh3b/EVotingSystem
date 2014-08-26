<?php 
require('config.php');
include 'functions.php';

$user = $_SESSION['user'];
$hall = $_SESSION['hall'];
				
	$dbhall = mysql_query("SELECT * FROM admin WHERE `htmlname` = '$hall'");
	while($hallname = mysql_fetch_assoc($dbhall)){
	$aa = $hallname['dbname'];
	}
	
	
mysql_query("UPDATE `$aa` SET `active`= 0 WHERE `uid` = '$user'");



session_destroy();

setcookie('uname', "", time()-300);
setcookie('hos', "", time()-300);
header("Location: index.php");


?>