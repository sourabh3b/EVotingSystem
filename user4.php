<html>
<meta name = "viewport" content="width=width-device , initial-scale=1.0" />
<link href = "css/bootstrap.min.css" rel = "stylesheet" />
<link href = "css/styles.css" rel = "stylesheet" />
</body>

<?php
require('config.php');
include 'functions.php';
if(!loggedin()){
header("Location: logout.php");
exit();
}

$user = $_SESSION['user'];
$hall = $_SESSION['hall'];
echo "$user";

if($hall == "arya"){
	$aa = "hall2";
	$ab = "nom2";
}
if($hall == "budha"){
	$aa = "hall4";
	$ab = "nom4";
}
if($hall == "ashoka"){
	$aa = "hall1";
	$ab = "nom1";
}
if($hall == "chan"){
	$aa = "hall3";
	$ab = "nom3";
}

$check = mysql_query("SELECT * FROM `$aa` WHERE `uid` = '$user' AND `active` = 2");
if(mysql_num_rows($check) > 0 ){
echo "enter";
}else{
header("Location: logout.php");
exit();
}


echo "<h2>Hello ! $user </h2>";
?>
<div class="container">
<h2>Welcome to <?php echo "$aa" ?></h2>
<h3>All Nominees in <?php echo "$aa"; ?></h3>
<div>

<?php

$sql = mysql_query("SELECT * FROM `$ab`");
$i = 1;
while($rows = mysql_fetch_assoc($sql)){
$allu = $rows['name'];
$allp = $rows['vote'];
$alls1 = $rows['sup1'];
$alls2 = $rows['sup2'];
$alld = $rows['dep'];
if(!isset($_POST['spass'])){
$charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@!#%&?';
$nextpass = substr(str_shuffle($charset),0,12);
}
?>

<?php if($i == 1){ ?>
	<div class= "row" >
	<?php } ?>
	<?php 
				switch ($i) {
			case 1:
				?>  
						<div class= "col-md-4 well">
						
						<div class="row">
						<div class="col-sm-6 thumbnail">
						<img  src = "b.png" />
															
						</div>
						<div class="col-sm-6 thumbnail well">
						<div class="row"><?php echo "name: $allu"; ?></div>
						<div class="row"><?php echo "VoteID: $nextpass"; ?></div>
						<div class="row"><?php echo "Dep: $alld"; ?></div>
						<div class="row"><?php echo "vote: $allp"; ?></div>
						<div class="row"><?php echo "supp1: $alls1"; ?></div>
						<div class="row"><?php echo "supp2: $alls2"; ?></div>
						</div>
						
						</div>
						
						</div>
				<?php
				$i = 2;
				break;
			case 2:
				?>
						<div class= "col-md-4 well">
						
						<div class="row">
						<div class="col-sm-6 thumbnail">
						<img src = "a.jpg" />
						
						</div>
						<div class="col-sm-6 thumbnail well">
						<div class="row"><?php echo "name: $allu"; ?></div>
						<div class="row"><?php echo "VoteID: $nextpass"; ?></div>
						<div class="row"><?php echo "Dep: $alld"; ?></div>
						<div class="row"><?php echo "vote: $allp"; ?></div>
						<div class="row"><?php echo "supp1: $alls1"; ?></div>
						<div class="row"><?php echo "supp2: $alls2"; ?></div>
						</div>
						
						</div>
						
						</div>
				<?php
				$i = 3;
				break;
			case 3:
				?>
						<div class= "col-md-4 well">
						
						<div class="row">
						<div class="col-sm-6 thumbnail">
						PHOTO
						</div>
						<div class="col-sm-6 thumbnail well">
						<div class="row"><?php echo "name: $allu"; ?></div>
						<div class="row"><?php echo "VoteID: $nextpass"; ?></div>
						<div class="row"><?php echo "Dep: $alld"; ?></div>
						<div class="row"><?php echo "vote: $allp"; ?></div>
						<div class="row"><?php echo "supp1: $alls1"; ?></div>
						<div class="row"><?php echo "supp2: $alls2"; ?></div>
						</div>
						
						</div>
						
						</div>
				<?php
				$i = 1;
				break;
		}
	
	
	?>
	<?php if($i == 1){ ?>
	 </div>
	<?php } ?>

<?php } ?>
<div class="form-group">
    <input type="text" class="form-control" placeholder="Enter VoterID">
  </div>
<button type="button" class="btn btn-primary form-control" name="submit" >Vote</button>
  

</div>
<a href='logout.php'> LogOut!</a>
</div>
</body>
</html>