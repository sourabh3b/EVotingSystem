<?php
 
require('config.php');

include 'functions.php';

if(loggedin()){
	header("Location: user.php");
	exit();
}
if(!loggedin()){
	if(isset($_COOKIE['uname']) && isset($_COOKIE['hos'])){
	//echo "adg";
		if(!isset($_SESSION['user']) && !isset($_SESSION['hall'])){
			//echo "qwertyu";

			$user = $_COOKIE['uname'];
			$hall = $_COOKIE['hos'];
			
			$dbhall = mysql_query("SELECT * FROM admin WHERE `htmlname` = '$hall'");
			while($hallname = mysql_fetch_assoc($dbhall)){
			$aa = $hallname['dbname'];
			}
		
			mysql_query("UPDATE `$aa` SET `active`= 0 WHERE `uid` = '$user'");
			setcookie('uname', "", time()-600);
			setcookie('hos', "", time()-600);
			header("Location: index.php");
			exit();
				
		}
		
	}
}
if(isset($_POST['submit'])){
	$captcha = mysql_real_escape_string($_POST['cap']);
	
	$user = mysql_real_escape_string(strtoupper($_POST['uid']));
	$pass = mysql_real_escape_string($_POST['pass']);
	$hall = $_POST['hall'];
	
	if($user && $pass && $captcha){
		if($captcha == $_SESSION['secure']){
	
		$dbhall = mysql_query("SELECT * FROM admin WHERE `htmlname` = '$hall'");
		while($hallname = mysql_fetch_assoc($dbhall)){
			$aa = $hallname['dbname'];
		}
		
		$enpass = md5($pass.$user);
		$sql = mysql_query ( "SELECT * FROM `$aa` WHERE `uid` = '$user'");
			if( mysql_num_rows($sql) > 0){
				while($rows = mysql_fetch_assoc($sql)){
				$db_pass=$rows['enpass'];
				$active = $rows['active'];
					if($enpass == $db_pass){
						if($active == 0){
						//mysql_query("UPDATE `$aa` SET `active`= 1 WHERE `uid` = '$user'");
						
						$_SESSION['user'] = $user;
						$_SESSION['hall'] = $hall;
						
						setcookie('uname', $user , time()+300);
						setcookie('hos', $hall , time()+300);
						
						$charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@!#%?';
						$nextpass = substr(str_shuffle($charset),0,12);
						$_SESSION['pass'] = $nextpass;
						$getemail = mysql_query("SELECT * FROM `$aa` WHERE `uid` = '$user'");
							
							while($array = mysql_fetch_assoc($getemail)){
							$to = $array['email'];
							}
							$sub = $user;
							echo "Sent Code To $to";
							$from = "From: vinoddosapati02@gmail.com";
							$body = "Your Election Confirm Code is ::$nextpass:: ";
							mail($to,$sub,$body,$from);
						
						
						
						mysql_query("UPDATE `$aa` SET `active`= 1 WHERE `uid` = '$user'");
						header("Location: coder.php");
						exit();
						}else{
							$_SESSION['user'] = $user;
							$_SESSION['hall'] = $hall;
							$a = "Cannot login more than one location </br>";?>
								<form action ="logoff.php" method="POST">
								<!--<input type="submit" name="logoff" value="Logout from everywhere" />-->
								<button type="submit" class="btn btn-danger form-control" name="logoff" >Logout from every Device</button>
								</form>
								<?php
						}
					}
					else{
						$a = "entered wrong password";
						$p = "has-error has-feedback";
					}
				}
			}
			else{
				$a = "user do not exist in $aa !";
				$u = "has-error has-feedback";
				$h = "has-error";
			}
		}
	else{
		$a = "try other image";
		$c = "has-error has-feedback";
		
	}
}else{
	$a = "Enter all Fields";
	if($user == ""){
	$u = "has-warning has-feedback";
	}
	if($pass == ""){
	$p = "has-warning has-feedback";
	}
	if($captcha == ""){
	$c = "has-warning has-feedback";
	}
}
}
?>

<div class = "row">
<center><h1>LOGIN</h1>

<?php 
if(isset($_POST['submit']))
echo "$a </br>";
?>
</center>
</div>

<div class = "col-xs-4">
<p> Demo: User- 1201cs12 : Password- vinod </p>
<form action="index.php" method="POST">

  <div class="form-group <?php if(isset($u)){echo $u; } ?> " >
    <input type="text" class="form-control"  name ="uid" placeholder="Enter RollNo" />
  </div>

  <select name = "hall" class = "form-control ">
  <?php 
  $gethall = mysql_query("SELECT * FROM admin");
  while($drophall = mysql_fetch_assoc($gethall)){
  $value = $drophall['htmlname'];
  $hallname = $drophall['hallname'];
  ?>
  <option <?php echo "value= $value"; ?> > <?php echo "$hallname" ; ?> </option>
  
  <?php } ?>
</select></br>

  <div class="form-group <?php if(isset($p)){echo $p; } ?> ">
    <input type="password" class="form-control"  name="pass" placeholder="Enter password" />
  </div>
		<?php 
		
		$charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$nextpass = substr(str_shuffle($charset),0,7);
		//$num= rand(1111, 9999);
		$_SESSION['secure'] = $nextpass;
		//echo $num;
		?>
		<center><img src="captcha.php" /></center></br>
		<div class="form-group <?php if(isset($c)){echo $c; } ?> ">
		<input type="text" class="form-control" name="cap" placeholder="Enter the above code" />
		</div>
		<?php //if(isset($_SESSION['secure'])){ echo $_SESSION['secure']; } ?>
		
  
  <!--  <input type="submit" class="btn btn-sucess form-control" name="submit" value="Login"></br>-->
<button type="submit" class="btn btn-primary form-control" name="submit" >Login</button>  
</form></br>
<form action="register.php">
<button type="submit" class="btn btn-success form-control">Register</button>
</form>

<!--<a href="index.php?p=register" name ="link" value ="Reg">Register as a nommine</a>-->

</div>


