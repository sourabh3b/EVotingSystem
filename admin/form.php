<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<center><h3>This is admin login</h3></center>
<center><h4>If You are already registered,login from here</h4></center>

<?php


session_start();

require('config.php');

$nameErr = "";
$passErr="";

if(isset($_POST['submit']))
{
if ($_SERVER["REQUEST_METHOD"] == "POST"){
if (empty($_POST["name"]))
     {$nameErr = "Name is required";}
   else
     {
     $name = $_POST["name"];
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name))
       {
       $nameErr = "Only letters and white space allowed"; 
       }
     }
	 echo "hello";
	 
	 if (empty($_POST["pass"]))
     {$passErr = "password is required";}
   else
     {
     $pass = $_POST["pass"];
     // check if name only contains letters and whitespace
     
     }
	 
	 
	 }

$uname=mysql_escape_string($_POST['uname']);
$pass=mysql_escape_string($_POST['pass']);

$abcd=$uname."".$pass;
#$pass=md5($abcd);
$sql=mysql_query("SELECT * FROM `admins` WHERE `name`='$uname' AND `password`='$pass'");

if(mysql_num_rows($sql)>0)
{
echo "you are now logged in";
$_SESSION['uname']=$uname;

header("Location: adminhme.php");
exit();
}
else{
echo "wrong username or  password";
}
}




else
{
?>
<center><p><span class="error">* required field.</span></p></center>
<form>
<center>
<form  method="POST">
<b>USERNAME:</b><input type="text" name="uname" /> 
 <span class="error">* <?php echo $nameErr;?></span><br>

<b>PASSWORD:</b><input type="password" name="pass" />
 <span class="error">* <?php echo $passErr;?></span><br />

 
<input type="submit" name="submit" value="login">

</center>
</form>
<?php } ?>

</body>
</html>