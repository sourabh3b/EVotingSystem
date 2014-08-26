<!DOCTYPE html>
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

	$dbhall = mysql_query("SELECT * FROM admin WHERE `htmlname` = '$hall'");
	while($hallname = mysql_fetch_assoc($dbhall)){
	$aa = $hallname['dbname'];
	$ab = $hallname['nomhall'];
	}

$check = mysql_query("SELECT * FROM `$aa` WHERE `uid` = '$user' AND `active` = 2");
if(mysql_num_rows($check) > 0 ){
//mysql_query("UPDATE `$aa` SET `active`= 2 WHERE `uid` = '$user'");
}else{
header("Location: logout.php");
exit();
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blank Page- SB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.confirmon.css"/>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">IIT Patna</a>
        </div>
		<?php 
		if(!empty($_GET['r'])){
				$pq = $_GET['r'];
			}else{
			$pq = "";
			}
			?>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
			<li <?php if(empty($_GET['r'])){ echo 'class="active" ';} ?> ><a href="user.php"><i class="fa fa-dashboard"></i> Index</a></li>
				<?php 
				$gethall = mysql_query("SELECT * FROM post");
				while($droppost = mysql_fetch_assoc($gethall)){
				$post = $droppost['post']; 
				$dbname = $droppost['dbpost']; //gs,main
				$htmlname = $droppost['htmlpost']; //1,2,3
				$html = "user.php?r=";
				$url = $html.$htmlname;
				?>
				
				<li <?php if($pq == $htmlname){ echo 'class="active" ';} ?> ><a href = "<?php echo "$url" ; ?>"><i class="fa fa-dashboard"></i> <?php echo "$post" ; ?></a></li>
				
				<?php } ?>
				<li>  IIT Patna 2013-14</li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo "<b> $user </b>"; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="changepwd.php"><i class="fa fa-gear"></i> Change Password</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
	  
<div class="container">
<?php
echo "<h2>Hello ! $user </h2>";
?>
<h2>Welcome to <?php echo "$aa" ?></h2>
<h3>All Nominees in <?php echo "$aa"; ?></h3>


<?php
		if(empty($_GET['r'])){
			//echo "Continue To UR Voting";
			?>
			
			<h3 id="progress-animated">Animated</h3>
            <div class="bs-example">
              <div class="progress progress-striped active">
                <div class="progress-bar" style="width: 90%"></div>
              </div>
            </div>
			</div>
						</div>
						</div>
						
						<script src="js/jquery-1.10.2.js"></script>
						<script src="js/bootstrap.js"></script>

						</body>
						</html>
			<?php
			exit();
		}
		else{
			if(!empty($_GET['r'])){
				$p = $_GET['r'];
			}
		}
$seat = mysql_query("SELECT * FROM post WHERE `htmlpost` = '$p' ");
if(mysql_num_rows($seat) > 0){
	while($department = mysql_fetch_assoc($seat)){
		$db_post = $department['dbpost'];
	}
}
$db_vote = mysql_query("SELECT * FROM `$aa` WHERE `uid` = '$user' ");
while($value = mysql_fetch_assoc($db_vote)){
$db_r = $value[$db_post];
}

if(isset($_POST['vote'])){
	$nomid = mysql_real_escape_string ($_POST['code']);
	if($nomid){
	if($db_r == 0){
		$db_nomid = mysql_query("SELECT * FROM `$ab` WHERE `nomid` = '$nomid' AND `dep` = '$db_post'");
			if(mysql_num_rows($db_nomid) > 0){
				while($check = mysql_fetch_assoc($db_nomid)){
					$db_check = $check['nomid'];
					$db_vot = $check['vote'];
					echo "$db_check";
					echo "$nomid";
						if($db_check == $nomid){
							//mysql_query("UPDATE `$aa` SET `$db_post` = 1 WHERE `uid` = '$user'");
							$vote = $db_vot + 1;
							mysql_query("UPDATE `$ab` SET `vote` = '$vote' WHERE `nomid` = '$nomid' AND `dep` = '$db_post'");
							mysql_query("UPDATE `$aa` SET `$db_post` = 1 WHERE `uid` = '$user'");
							$db_r = 1;
						}else{
							echo "Error for NomineeID .. ! ";
						}
				}
			}else{
				echo "No Such Nominee ID .. !";
			}
	}else{
		
		if($db_r == 1){
			echo "Error of submit";
		}
	}
}else{
echo "Fill All";
}


}
		


$sql = mysql_query("SELECT * FROM `$ab` WHERE `dep` = '$db_post'");
$i = 1;
while($rows = mysql_fetch_assoc($sql)){
$allu = $rows['name'];
$allp = $rows['vote'];
$alls1 = $rows['sup1'];
$alls2 = $rows['sup2'];
$alld = $rows['dep'];
$allid = $rows['nomid'];

?>

<?php if($i == 1){ ?>
	<div class= "row" >
	<?php } ?>
	<?php 
				switch ($i) {
			case 1:
				?>  
						<div class= "col-sm-4 well">
						
						<div class="row">
							<div class="col-sm-12 thumbnail">
							<img src = "b.png" width = "300px" />								
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12 thumbnail well">
							<div class="row"><?php echo "name: $allu"; ?></div>
							<div class="row"><?php echo "VoteID: $allid"; ?></div>
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
						<div class= "col-sm-4 well">
						
						<div class="row">
						<div class="col-sm-12 thumbnail">
						<img src = "a.jpg" />
						</div>
						</div>
						<div class="row">
						<div class="col-sm-12 thumbnail well">
						<div class="row"><?php echo "name: $allu"; ?></div>
						<div class="row"><?php echo "VoteID: $allid"; ?></div>
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
						<div class= "col-sm-4 well">
						
						<div class="row">
						<div class="col-sm-6 thumbnail">
						PHOTO
						</div>
						<div class="col-sm-6 thumbnail well">
						<div class="row"><?php echo "name: $allu"; ?></div>
						<div class="row"><?php echo "VoteID: $allid"; ?></div>
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

<?php 
   }
	if($i == 2 ){
	?> </div> <?php
  }
 if($i == 3){
 ?>
 </div>
 <?php
 }  
?>


<div class= "row" >
<?php
if($db_r == 0){
?>

<form id="voting" action = "" method = "POST">

<div class="form-group">
    <input type="text" class="form-control" name ="code" placeholder="Enter VoterID...">
</div>
<button type="submit" class="btn btn-primary form-control" onClick="return confirm('Are you sure you want to vote');"  id="vote" name="vote" >Vote</button>

</form>
<?php }
else{
	if($db_r == 1){
		echo "U R Voted";
	}else{
		echo "Error of r";
	}
}
?>
</div>
</div>

</div>
	<!-- JavaScript -->
	
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	


  </body>
</html>