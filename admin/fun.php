


<?php


session_start();                  //starting session

require('config.php');           //include config file

if(isset($_POST['submit']))
{
$uname=mysql_escape_string($_POST['uname']);               //checking if user has submitted the form and assigning entered va;ues to new variable
$pass=mysql_escape_string($_POST['pass']);

$abcd=$pass."".$uname;                 //forming pattern with password for more security
$pass=md5($abcd);                       //encryption of password
$sql=mysql_query("SELECT * FROM `admins` WHERE `name`='$uname' AND `password`='$pass'");     //checking in database for entered username and password

if(mysql_num_rows($sql)>0)
{
echo "you are now logged in";
$_SESSION['uname']=$uname;//you are logged in and assigning session variable to a variable

header("Location: fun2.php");  //redirecting to admin home
exit();
}
else{
echo "<center>"."wrong username or  password"."</center>";       //in case u have enetered wrong username and password
}
}







?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


  </head>
  <body>




<div class="container">
<div class="row">

<div class="col-sm-4">

</div>

<div class="col-sm-4">
	<h3><p>Welcome Admin</p></h3>
</div>


<div class="col-sm-4">

</div>


</div>
</div>

<hr />

<div class="row">
<div class="col-md-4">




</div>
<div class="col-md-4">
	
<form role="form" method="post">   <!-- form for login for the admin-->
  
   <div class="form-group">
    <label for="exampleInputPassword1">Enter Username</label>
    <input class="form-control" id="exampleInputPassword1" placeholder="Enter Password" type="text" name="uname">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Enter Password</label>
    <input class="form-control" id="exampleInputPassword1" placeholder="Enter Password"  type="password" name="pass" >
  </div>
  
<?php 
		
		$charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$nextpass = substr(str_shuffle($charset),0,7);
		//$num= rand(1111, 9999);
		$_SESSION['secure'] = $nextpass;
		
		?>  
		
		<button type="submit" class="btn btn-primary"  name="submit" value="login" >Submit</button>
  
</form>

</div>

<div class="col-md-4">
	

</div>

</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


