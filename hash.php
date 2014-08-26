<?php 

require('config.php');
include 'functions.php';
$sql = mysql_query("SELECT COUNT(active) FROM `hall1` WHERE `active` = 0");
$a = mysql_fetch_assoc($sql);
echo $a['COUNT(active)'];


?>