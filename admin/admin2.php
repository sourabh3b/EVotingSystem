<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Add Admin</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" rel="stylesheet" href="cs/bootstrap.css" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Add custom CSS here -->
    <link type="text/css" rel="stylesheet" href="cs/half-slider.css" />
	<link href="cs/jasny-bootstrap.min.css" rel="stylesheet">

	<style>
	.error{
	  color:#FF0000;
	  }
	
	</style>
</head>
<body>

<?php

require('config.php');               //include config file

$a="";
if(isset($_POST['add'])){          //checking if user has submitted the form

$name=$_POST['uname'];
$password=$_POST['pass'];
$myname=$_POST['myname'];
$eid=$_POST['eid'];
$phone=$_POST['phone'];                      //assigning the entered variables to new variables
 
 
 $sql2="SELECT * FROM  `admins`  WHERE name='$name'";            //checking in database of  admins for entered user id
$query = mysql_query($sql2);
 
 
 if(empty($_POST["uname"]))
  {
      $a="please enter username";                 //if we leave out username column empty
	}else if(empty($_POST["eid"]))
	{
	$a="please enter emailid";                    //if we leave out emailid column empty
	}
	elseif(empty($_POST["pass"])){
	$a="please enter password";                  //if we leave out password column empty
	
	}
	

	 
 

 
elseif(mysql_num_rows($query)> 0){
    $a="username already exists";               //after querying in case if user already exists with that username
}	
else{ 

         $name=mysql_escape_string($name);	 
         $password=mysql_escape_string($password);	
       $myname=mysql_escape_string($myname);
		 $eid=mysql_escape_string($eid);
		 $phone=mysql_escape_string($phone);
		 
		 $enc=$name."".$password;
		 $password=md5($enc);

		 
	$result=mysql_query("INSERT INTO `admins`(`id` , `name` , `password` ,`added by` ,`emailid` , `phonenum` ) VALUES(NULL, '$name', '$password', '$myname' , '$eid' , '$phone')");	   //inserting into database with entered values 
		 header('Location:login.php');    //redirecting to login page
		 
		 
	}	 
}
?>

<form method="POST" action="admin2.php">       <!--form for adding admin into database-->




				<div class="row">

				<div class="col-sm-4">

				</div>

				<div class="col-sm-4">
	             
<h3>			<p><b>For adding Admin</b></p></h3>

				</div>


				<div class="col-sm-4">

				</div>


				</div>

<div class="row">

<div class="col-sm-4">

</div>

<div class="col-sm-4">
<span class="error">* Required fields</span><!--form for adding user to the database-->
	<span class="error"><?php echo "*".$a;?></span><br />
<span class="error">*</span><b>USERNAME:</b><input type="text" class="form-control" name="uname" /> <br>
<span class="error">*</span><b>PASSWORD:</b><input type="password" class="form-control" name="pass" /><br />
<span class="error">*</span><b>E-Mail:</b><input type="text" class="form-control" name="eid" /> <br>
<b>Phone Number:</b><input type="text" class="form-control" name="phone" /><br />
<b>Enter your Name</b><input type="text" class="form-control" name="myname" /><br />
 
<input type="submit" name="add" class="btn btn-primary form-control" value="Add As Admin">

</div>


<div class="col-sm-4">

</div>


</div>


</form>




</body>
</html>