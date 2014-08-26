
<?php 
require('config.php');
include 'functions.php';

if(!loggedin()){
header("Location: logout.php");
exit();
}

$user = $_SESSION['user'];
$hall = $_SESSION['hall'];

$dbhall = mysql_query("SELECT * FROM admin WHERE `htmlname` = '$hall'");
while($hallname = mysql_fetch_assoc($dbhall)){
$db_hall = $hallname['dbname'];
}
$check = mysql_query("SELECT * FROM `$db_hall` WHERE `uid` = '$user' AND `active` = 2");
if(mysql_num_rows($check) > 0 ){

}else{
header("Location: logout.php");
exit();
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
if(isset($_POST['change'])){
	$pass = mysql_real_escape_string ($_POST['pass']);
	$repass = mysql_real_escape_string ($_POST['repass']);
	$newpass = mysql_real_escape_string ($_POST['newpass']);
	if($pass && $repass && $newpass){
		if($newpass == $repass){
			if(($pass != $newpass)){
				
				$passcheck = mysql_query("SELECT * FROM `$db_hall` WHERE `uid` = '$user' AND `active` = 2 AND `pass` = '$pass'");
				if(mysql_num_rows($passcheck) > 0){
					$user = $_SESSION['user'];
					$ennewpass = md5($newpass.$user);
					mysql_query("UPDATE `$db_hall` SET `pass`= '$newpass' WHERE `uid` = '$user' AND `active` = 2");
					mysql_query("UPDATE `$db_hall` SET `enpass`= '$ennewpass' WHERE `uid` = '$user' AND `active` = 2");
					echo "password changed sucessfully !";
				}else{
					echo "Enter correct password";
				}
			}else{
				echo "newpassword is same as old password";
			}
		}else{
			echo "Passwords are not matching";
		}
	}else{
		echo "enter all fields";
	
	}
}


?>

<div class="container">
<div class="row"><center><h2>Change Password</h2></center></div>
<div class="row">
	<div class= "col-sm-3">
	<form action="" method="POST">
		<label >Enter Current Password</label>
		<div class="form-group">
		<input type="password" class="form-control" name="pass" placeholder="Enter Current password" />
		</div>
	
		<label>Enter New Password</label>
		<div class="form-group">
		<input type="password" class="form-control" name="repass" placeholder="Enter New password" />
		</div>
		
		<label>Re-Enter New Password</label>
		<div class="form-group">
		<input type="password" class="form-control" name="newpass" placeholder="Re-Enter New password" />
		</div>
		
		<button type="submit" class="btn btn-primary form-control" name="change" >Change Password</button>
	</form>
	
	</div>
</div>
<a href="user.php">Go for Voting !</a></br>
<a href="logout.php">Logout</a>
</div>
</body>

</html>