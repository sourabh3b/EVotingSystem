<?php
 
require('config.php');						//Connectiong database

include 'functions.php';					//Checking if logged in

if(loggedin()){
	header("Location: user.php");
	exit();
}
if(!loggedin()){
	if(isset($_COOKIE['uname']) && isset($_COOKIE['hos'])){
	echo "adg";
		if(!isset($_SESSION['user']) && !isset($_SESSION['hall'])){
			echo "qwertyu";

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
if(isset($_POST['submit'])){								//Submitted
	$captcha = mysql_real_escape_string($_POST['cap']);
	
	$user = mysql_real_escape_string ($_POST['uid']);
	$pass = mysql_real_escape_string ($_POST['pass']);
	$hall = $_POST['hall'];
	//inputs protecting from sql injection
	
	if($user && $pass && $captcha){						//checking if all fields are entered
		if($captcha == $_SESSION['secure']){				//Checking Entered Captcha
	
		$dbhall = mysql_query("SELECT * FROM admin WHERE `htmlname` = '$hall'");		//validating hostel from database
		while($hallname = mysql_fetch_assoc($dbhall)){
			$aa = $hallname['dbname'];
		}
		
		$enpass = md5($pass.$user);								//hashing 
		$sql = mysql_query ( "SELECT * FROM `$aa` WHERE `uid` = '$user'");			//Validating user from given hostel
			if( mysql_num_rows($sql) > 0){
				while($rows = mysql_fetch_assoc($sql)){
				$db_pass=$rows['enpass'];
				$active = $rows['active'];
					if($enpass == $db_pass){					//checking the hashing
						if($active == 0){					//whether logged in
						//mysql_query("UPDATE `$aa` SET `active`= 1 WHERE `uid` = '$user'");
						
						$_SESSION['user'] = $user;		//setting session for user
						$_SESSION['hall'] = $hall;		//setting session for hostel
						
						setcookie('uname', $user , time()+300);	//setting cookie for user
						setcookie('hos', $hall , time()+300);   //setting cookie for hostel
						header("Location: coder.php");		//redirecting to coder.php
						exit();
						}else{ //checking for multiple login
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
						$f = 'class="glyphicon glyphicon-remove form-control-feedback"';
					}
				}
			}
			else{
				$a = "user do not exist in $aa !";
				$u = "has-error has-feedback";
				$h = "has-error";
				$f = 'class="glyphicon glyphicon-remove form-control-feedback"';
			}
		}
	else{
		$a = "try other image";
		$c = "has-error has-feedback";
		$f = 'class="glyphicon glyphicon-remove form-control-feedback"';
		
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
	$f = 'class="glyphicon glyphicon-warning-sign form-control-feedback"';
}
}
?>

<div class = "row">
<center><h1>LOGIN</h1></center>
</div>

<div class = "col-xs-4">

<form action="index.php" method="POST">
<!--input field for roll number-->
  <div class="form-group <?php if(isset($u)){echo $u; } ?> " >
    <input type="text" class="form-control"  name ="uid" placeholder="Enter RollNumber... Eg.1201CS33" />
	<span <?php if(isset($u)){echo $f;} ?> ></span>
  </div>
 <!--getting existing hostel from database-->
  <select name = "hall" class = "form-control <?php if(isset($h)){echo $h; } ?> ">
  <?php 
  $gethall = mysql_query("SELECT * FROM admin");
  while($drophall = mysql_fetch_assoc($gethall)){
  $value = $drophall['htmlname'];
  $hallname = $drophall['hallname'];
  ?>
  <option <?php echo "value= $value"; ?> > <?php echo "$hallname" ; ?> </option>
  
  <?php } ?>
</select></br>
<!--input field for password-->
  <div class="form-group <?php if(isset($p)){echo $p; } ?> ">
    <input type="password" class="form-control"  name="pass" placeholder="Enter password" />
	<span <?php if(isset($p)){echo $f;} ?> ></span>
  </div>
		<?php 
		
		$charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$nextpass = substr(str_shuffle($charset),0,7);				//generate random code for captcha
		//$num= rand(1111, 9999);
		$_SESSION['secure'] = $nextpass;
		//echo $num;
		?>
		<center><img src="captcha.php" /></center></br>				<!--displaying  captcha -->
		<div class="form-group <?php if(isset($c)){echo $c; } ?> ">
		<input type="text" class="form-control" name="cap" placeholder="Enter the above code" />
		<span <?php if(isset($c)){echo $f;} ?> ></span>
		</div>
		<?php //if(isset($_SESSION['secure'])){ echo $_SESSION['secure']; } ?>
		
  
  <!--  <input type="submit" class="btn btn-sucess form-control" name="submit" value="Login"></br>--> 
<!--		<button type="submit" class="btn btn-primary form-control" name="submit" >Login</button>	<!--Login--> -->
  


<!--Added Content for center notification-->
  <div class="box-content">
						<p class="center">
							<button class="btn btn-primary noty" name="submit" value="Login" data-noty-options='{"text":"incorrect","layout":"center","type":"error"}'><i class="icon-bell icon-white"></i> Login</button>
						</p>
					</div>	
<!--Added Content for center notification-->



</form>

<?php 
if(isset($_POST['submit']))
echo "$a </br>";	//displaying status

?>				
<a href="index.php?p=register" name ="link" value ="Reg">Register as a nominee</a>

</div>



