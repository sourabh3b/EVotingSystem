<html>
<body>
<?php 
require ('config.php');
include 'functions.php';

$get = mysql_query("SELECT * FROM admin ");
while($ar = mysql_fetch_assoc($get)){
$hall = $ar['dbname'];
$getpass = mysql_query("SELECT * FROM `$hall` ");
while($geten = mysql_fetch_assoc($getpass)){
$us = $geten['uid'];
$ps = $geten['pass'];
$enpass = md5($ps.$us);
mysql_query("UPDATE `$hall` SET `enpass`= '$enpass' WHERE `uid` = '$us'");
mysql_query("UPDATE `hall1` SET `email`= 'bhookya.cs12@iitp.ac.in' WHERE `uid` = '$us'");
mysql_query("UPDATE `hall2` SET `email`= 'dosapati.cs12@iitp.ac.in' WHERE `uid` = '$us'");
mysql_query("UPDATE `hall3` SET `email`= 'sourabh.cs12@iitp.ac.in' WHERE `uid` = '$us'");
mysql_query("UPDATE `hall4` SET `email`= 'duvvuru.cs12@iitp.ac.in' WHERE `uid` = '$us'");
}

}
?>



</body>
</html>