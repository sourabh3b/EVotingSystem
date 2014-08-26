<?php 
require('config.php');
include 'functions.php';

if(!register()){            //stop accessing directly
session_destroy();
echo "asd";
header("Location: index.php?p=register"); //redirecting to home registration 
exit();
}

if(empty($_GET['p'])){
header("Location: index.php?p=step2");      //including in index.php
}

 $nominee = $_SESSION['make'];      //nominee
 $stdhall = $_SESSION['go'];       
 $nomhall = $_SESSION['gon'];
echo $codenom = $_SESSION['get'];echo "</br>";
echo $codesp1 = $_SESSION['got'];echo "</br>";
echo $codesp2 = $_SESSION['let'];echo "</br>";
 $to = $_SESSION['eget1'];
 $to1 = $_SESSION['eget2'];
 $to2 = $_SESSION['eget3'];
$list = mysql_query("SELECT * FROM `$nomhall` WHERE `name` = '$nominee' AND `active`= 1 ");
if(mysql_num_rows($list) > 0 ){
	if(register())
	header("Location: finish.php");
}

if(isset($_POST['step2'])){
	$getnom = mysql_real_escape_string($_POST['codenom']);
	$getsp1 = mysql_real_escape_string($_POST['codesp1']);
	$getsp2 = mysql_real_escape_string($_POST['codesp2']);
	//input values ,protecting from sql injection
	if($getnom && $getsp1 && $getsp2){                                               //checking all feilds are filled
		if(($getnom == $codenom) && ($getsp2 == $codesp2) && ($getsp1 == $codesp1)){    //checking all OTP's are valid
			mysql_query("UPDATE `$nomhall` SET `active`= 1 WHERE `name` = '$nominee'");  //updating nominee is nominated sucessfull
			mysql_query("INSERT INTO `comm` (`id`,`nom`,`count`) VALUES('NULL','$nominee','0') ");
			echo "Sucessfully Registered";
			header("Location: finish.php");
			exit();
		}else{
			mysql_query("DELETE FROM `$nomhall` WHERE `name` = '$nominee' ");          //on wrong OTP inputs,deleting nominee from database
			session_destroy();                                                         //destroying session
			echo "Entered Code is Wrong \n Try Nominations Again ";        
			exit();
		}
	}else{
		echo "Enter all fields";
	}
}
if(!isset($_POST['step2'])){
echo "Nominee Code Sent to : $to "; echo "</br>";                  //print nominee email
echo "Supporter1 Code Sent to : $to1 "; echo "</br>";              //print supporter1 email
echo "Supporter2 Code Sent to : $to2 "; echo "</br>";             // print supporter2 email
}

?>


<div class="row"><center><h2>Step2 For Nominations</h2></center></div>
<div class="row">

<div class="row">

<div class="col-sm-4">

<button type="button" class="btn btn-default btn-lg btn-block" disabled="disabled">Step 1</button>
</div>

<div class="col-sm-4">
<button type="button" class="btn btn-primary btn-lg btn-block">Step 2</button>
</div>


<div class="col-sm-4">
  <button type="button" class="btn btn-default btn-lg btn-block" disabled="disabled">Step 3</button>
</div>


</div></br>

<center>
<form action="index.php?p=step2" method="POST" >
<label>Enter Nominee Confirm Code</label>
<input type="text" class="form-control"  name ="codenom" placeholder="Enter Nominee Code" /></br>

<label>Enter Supporter1 Confirm Code</label>
<input type="text" class="form-control"  name ="codesp1" placeholder="Enter Supporter1 Code" /></br>

<label>Enter Supporter2 Confirm Code</label>
<input type="text" class="form-control"  name ="codesp2" placeholder="Enter Supporter2 Code" /></br>

<button type="submit" class="btn btn-primary form-control" name="step2" >Step 2</button></br>

</form>
</center>
</div>




