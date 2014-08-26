<?php 

require('config.php');   //connecting database
include 'functions.php';  //including functions
	if(register()){         //checking in middle of registration
	session_destroy();      //destroying session
	}
	if(empty($_GET['p'])){                      //displaying in index.php
	header("Location: index.php?p=register");;
	}
if(isset($_POST['reg'])){
$user = mysql_real_escape_string(strtoupper($_POST['uid']));
$user1 = mysql_real_escape_string(strtoupper($_POST['uid1']));
$pass = mysql_real_escape_string(strtoupper($_POST['pass']));
$pass1 = mysql_real_escape_string(strtoupper($_POST['pass1']));
$hall = mysql_real_escape_string($_POST['hall']);
$dep = mysql_real_escape_string($_POST['dep']);
//input values ,preventing sql injection
	$dbhall = mysql_query("SELECT * FROM admin WHERE `htmlname` = '$hall'");      //getting name of tables
	while($hallname = mysql_fetch_assoc($dbhall)){
	$stdhall = $hallname['dbname'];                //student table name in database
	$nomhall = $hallname['nomhall'];               //nominee table name in database
	}

if($user && $user1 && $pass && $pass1){
if($user == $user1){
	$checku1 = mysql_query ( "SELECT * FROM `$stdhall` WHERE `uid` = '$user' ");            //checking nominee is a member of given hostel
	$checku2 = mysql_query ( "SELECT * FROM `$nomhall` WHERE `sup1` = '$user' OR `sup2` = '$user'");      //checking nominee is a supporter
    if(($pass != $pass1) && ($user != $pass || $user != $pass1)){                                     //every feild must not be empty
	    $sql = mysql_query ( "SELECT * FROM `$nomhall` WHERE `name` = '$user' ");            //checking nominee already nominations
		$sqlactive = mysql_query ( "SELECT * FROM `$nomhall` WHERE `name` = '$user' AND `active` = 1 ");       //checking nominee already nominated
		if(mysql_num_rows($sql) > 0 && mysql_num_rows($sqlactive) > 0){                  
		 $com ="Nominee Already EXISTS !!";
		}else{
			if(mysql_num_rows($sql) > 0){                                                 //Again nomanating,for a unfinished nominee
				mysql_query("DELETE FROM `$nomhall` WHERE `name` = '$user' ");
			}
			$dep1 = mysql_query ( "SELECT * FROM `$nomhall` WHERE `sup1` = '$pass' OR `sup2` = '$pass' OR `name` = '$pass'");  //checking supporter1 is already a supporter or a nominee already     
			$dep2 = mysql_query ( "SELECT * FROM `$nomhall` WHERE `sup1` = '$pass1' OR `sup2` = '$pass1' OR `name` = '$pass1'"); //checking supporter2 is already a supporter or a nominee already   
			$chek1 = mysql_query ( "SELECT * FROM `$stdhall` WHERE `uid` = '$pass' ");        //checking supporter1 is in same hostel
			$chek2 = mysql_query ( "SELECT * FROM `$stdhall` WHERE `uid` = '$pass1'");        //checking supporter2 is in same hostel
			if(mysql_num_rows($checku1) > 0){
				if(mysql_num_rows($checku2) > 0){
					$com = "Nominee is a supporter for Other Nominee";
				}else{
						if( mysql_num_rows($chek1) > 0 && mysql_num_rows($chek2) > 0){ 
							if(mysql_num_rows($dep1) > 0 || mysql_num_rows($dep2) > 0){
								$com = "Supporters already supported someone else";
							}else{
								
								$rand = rand(10000,99999);
								mysql_query("INSERT INTO `$nomhall` (`id`,`name`,`vote`,`sup1`,`sup2`,`dep`,`nomid`,`active`) VALUES('NULL','$user','0','$pass','$pass1','$dep','$rand','0') ");
								//inserting getting values into database
								$getemail = mysql_query("SELECT * FROM `$stdhall` WHERE `uid` = '$user'"); //getting email of nominee
								while($arr = mysql_fetch_assoc($getemail)){         
								$to = $arr['email'];                                        
								}
								$charnom = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@!%?';
								$passnom = substr(str_shuffle($charnom),0,12);                             //generating random code
								$body1 = "Confirm Code for Nominee $user is ::$passnom:: \n Department: $dep";  
								mail($to,"Confirm as Nominee",$body1,"From: vinoddosapati02@gmail.com");  //sending OTP to nominee
								$_SESSION['eget1'] = $to;        //Nominee email
								
								$getemail1 = mysql_query("SELECT * FROM `$stdhall` WHERE `uid` = '$pass'");   //getting supporter1 email
								while($arr1 = mysql_fetch_assoc($getemail1)){
								$to1 = $arr1['email'];
								}
								$charsup1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@!%?';
								$passsup1 = substr(str_shuffle($charsup1),0,12);                                   //randam code generator
								$body2 = "Supporter1 Code for Nominee $user is ::$passsup1::";
								mail($to1,"Confirm as Supporter1 for $user",$body2,"From: vinoddosapati02@gmail.com");    //sending mail to supporter1
								$_SESSION['eget2'] = $to1;              //supporter1 email
								
								$getemail2 = mysql_query("SELECT * FROM `$stdhall` WHERE `uid` = '$pass1'");    //geting email of supporter2
								while($arr2 = mysql_fetch_assoc($getemail2)){
								$to2 = $arr2['email'];
								}
								$charsup2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@!%?';
								$passsup2 = substr(str_shuffle($charsup2),0,12);                              //generating OTP of supporter2
								$body3 = "Supporter2 Code for Nominee $user is ::$passsup2::";
								mail($to2,"Confirm as Supporter2 for $user",$body3,"From: vinoddosapati02@gmail.com");  //sending mail for supporter2
								$_SESSION['eget3'] = $to2;   //supporter2 email
								
								
								$_SESSION['make'] = $user;         //nominee
								$_SESSION['go'] = $stdhall;        //Student table
								$_SESSION['gon'] = $nomhall;       //Nominee table
								$_SESSION['get'] = $passnom;       //Nominee OTP
								$_SESSION['got'] = $passsup1;      //Supporter1 OTP
								$_SESSION['let'] = $passsup2;      //Supporter2 OTP
								
								
								
								header("Location: step2.php");
								
								$com= "Registered";
							}

						}else{
							$com = "Supporter is not from same hostel";
						}
				}
			}else{
				$com = "User is not for given hostel";
			}
		}
	}else{
		$com = "Supporters must not be same !";
	}

}else{
	$com = "UserName Not Matching";
}
}else{
	$com = "Fill All plz......";
}
}
?>

<div class ="row">
<center><h2>Nominations..!!</h2></center>

<div class="row">

<div class="col-sm-4">
<button type="button" class="btn btn-primary btn-lg btn-block">Step 1</button>
</div>

<div class="col-sm-4">
<button type="button" class="btn btn-default btn-lg btn-block" disabled="disabled">Step 2</button>
</div>


<div class="col-sm-4">
  <button type="button" class="btn btn-default btn-lg btn-block" disabled="disabled">Step 3</button>
</div>


</div></br></br>


</div>
<div class = "row">
<div class="col-sm-4">
<center>
<form action="index.php?p=register" method="POST" class="well span4" >
<!--<label>Username</label>-->
<div class ="form-group">
<input class="form-control" type="text" name="uid" placeholder ="Nominee RollNo" /><br />
</div>
<!--<label>Confirm User<label>-->
<input class="form-control" type="text" name="uid1" placeholder ="Confirm RollNo"/><br />

<label>Select Hostel</label></br>
<select name ="hall" class="form-control">
 <?php 
  $gethall = mysql_query("SELECT * FROM admin");   //Getting existing hostels from database
  while($drophall = mysql_fetch_assoc($gethall)){
  $value = $drophall['htmlname'];
  $hallname = $drophall['hallname'];
  ?>
  <option <?php echo "value= $value"; ?> > <?php echo "$hallname" ; ?> </option>
  
  <?php } ?>
  
</select><br />


<label>Select Depertment</label></br>
<select name ="dep" class="form-control">
 <?php 
  $getpost = mysql_query("SELECT * FROM post");      //getting existing departments from database
  while($droppost = mysql_fetch_assoc($getpost)){
  $value = $droppost['dbpost'];
  $postname = $droppost['post'];
  ?>
  <option <?php echo "value= $value"; ?> > <?php echo "$postname" ; ?> </option>
  
  <?php } ?>		
</select><br />

<input class="form-control" type="text" name="pass" placeholder ="Supporter1 RollNo"/><br />


<input class="form-control" type="text" name="pass1" placeholder ="Supporter2 RollNo"/><br />






<b>Terms and conditions</b> </br>
 <b ><textarea readonly data-color="green" style="width:300px;">1.CPI  > 6 
2.No disciplinary action </textarea>	</br></br>
 

<input type="radio" id="showform" value="yes" name="showform" onchange="showhideForm(this.value);"/> I Agree
<input type="radio" id="showform" value="no" name="showform" onchange="showhideForm(this.value);"/>I do not agree</br></br>


<div id="div1" style="display:none"></br>

<button type="submit" class="btn btn-primary form-control" name="reg">Register</button> <br>		

</div>
<div id="div2" style="display:none">

<button type="button" class="btn btn-primary btn-lg" disabled="disabled">Submit </button> <br>
</div>








<!--<button type="submit" class="btn btn-primary form-control" name="reg" >Register</button>-->







<?php 
if(isset($_POST['reg']))
echo "$com";
?>
</div>
<div class="col-sm-6 col-sm-offset-2">

	
	<!---Video-->
	<video width="500" height="300" controls>
  <source src="final.mp4" type="video/mp4">

Your browser does not support the video tag.
</video> 

</div>
</div>
</form>
</center>
<script type="text/javascript">
function showhideForm(showform) {
    if (showform == "yes") {
        document.getElementById("div1").style.display = 'block';
        document.getElementById("div2").style.display = 'none';
    } 
    if (showform == "no") {
        document.getElementById("div2").style.display = 'block';
        document.getElementById("div1").style.display = 'none';
    }
}
</script>
  