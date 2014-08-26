<?php 

require('config.php');
$sql="SELECT * FROM  post";
mysql_query($sql);
echo $sql;


?>