<?php 
require('config.php'); 
include 'functions.php';
$gethall = mysql_query("SELECT * FROM `hall4`");
while($arr = mysql_fetch_assoc($gethall)){
$user = $arr['uid'];
mysql_query("INSERT INTO `comm` (`id`,`nom`,`count`) VALUES('NULL','$user','0') ");
}

?>