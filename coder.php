<?php 
require('config.php');
include 'functions.php';
if(!loggedin()){
header("Location: logout.php");
exit();
}

$suser = $_SESSION['user'];
$shall = $_SESSION['hall'];

	$dbhall = mysql_query("SELECT * FROM admin WHERE `htmlname` = '$shall'");
	while($hallname = mysql_fetch_assoc($dbhall)){
		$stab = $hallname['dbname'];
	}

if(!isset($_POST['spass'])){
$get = mysql_query("SELECT * FROM `$stab` WHERE `uid` = '$suser'");
while($array = mysql_fetch_assoc($get)){
$che = $array['active'];
}
if($che == 0){
//mysql_query("UPDATE `$stab` SET `active`= 1 WHERE `uid` = '$suser'");
header("Location: logout.php");
exit();
}else{
if($che == 1){
//header("Location: logout.php");
//exit();
}else{
if($che == 2){
header("Location: user.php");
exit();
}
}
}

?>


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Site 'Vinod'</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" rel="stylesheet" href="cs/bootstrap.css" />

    <!-- Add custom CSS here -->
    <link type="text/css" rel="stylesheet" href="cs/half-slider.css" />

</head>
<body>


<?php
$nextpass = $_SESSION['pass'];
if(isset($_POST['mobile'])){

include 'smscon.php';
}

/*$charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@!#%?';
$nextpass = substr(str_shuffle($charset),0,12);
*/

mysql_query("UPDATE `$stab` SET `code`= '$nextpass' WHERE `uid` = '$suser'");
echo " >>  $nextpass  << ";
$suser = $_SESSION['user'];

}

if(isset($_POST['spass'])){
$secpass1 = mysql_real_escape_string($_POST['secpass']);
$ssql = mysql_query("SELECT * FROM `$stab` WHERE `uid` = '$suser'");
while($srow = mysql_fetch_assoc($ssql)){
$secpassc = $srow['code'];
$allow = $srow['active'];
}
if($secpass1 == $secpassc && $allow == 1){
mysql_query("UPDATE `$stab` SET `active`= 2 WHERE `uid` = '$suser'");
header("Location: user.php");
}
else{
header("Location: logout.php");
exit();
}
}
?>

<div class = "container">
<div class="row">
<div class= "col-sm-4 col-sm-offset-4">
<form action="coder.php" method ="POST">
<label>Confirm Your Entry</label>
<input type = "password" name="secpass" /> </br>

<button type="submit" class="btn btn-primary form-control" name="spass" >Submit OTP Code..!</button></br>
</br>
<button type="submit" class="btn btn-primary form-control" name="mobile" >Get OTP to your mobile</button>
</form>
</div>
</div>
</div>
</body>
</html>