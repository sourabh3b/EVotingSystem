<!DOCTYPE html>
<?php 
require('config.php');				//connecting database
include 'functions.php';			//checking if logged in
if(!loggedin()){
header("Location: logout.php");			//redirecting to logout.php
exit();
}

$user = $_SESSION['user'];			//getting sessions data(user)
$hall = $_SESSION['hall'];			//getting sessions data(hostel)
echo "$user";

	$dbhall = mysql_query("SELECT * FROM admin WHERE `htmlname` = '$hall'");	//getting datbase names of the hostel
	while($hallname = mysql_fetch_assoc($dbhall)){
	$aa = $hallname['dbname'];					//students hall table
	$ab = $hallname['nomhall'];					//nominees hall table
	$name = $hallname['hallname'];				//diplaying hostel name
	}

$check = mysql_query("SELECT * FROM `$aa` WHERE `uid` = '$user' AND `active` = 2");	//checking user and activity
if(mysql_num_rows($check) > 0 ){
//mysql_query("UPDATE `$aa` SET `active`= 2 WHERE `uid` = '$user'");
}else{
header("Location: logout.php");					//redirect to logout
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
				<?php 							// getting existing department from database 
				$gethall = mysql_query("SELECT * FROM post");
				while($droppost = mysql_fetch_assoc($gethall)){
				$post = $droppost['post']; 	//displaying post name
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
$den = 0;
$num =0;

		$getpost = mysql_query("SELECT * FROM `post` ");
		while($arrpost = mysql_fetch_assoc($getpost)){
			$checkpost = $arrpost['dbpost'];
			$posting = mysql_query("SELECT * FROM $aa WHERE `$checkpost` = 1 AND `uid` = '$user'" );
			if(mysql_num_rows($posting) > 0){
				$num = $num +1;
			}
			$den = $den+1;
		}
		//echo $den;
		//echo $num;
		$bar = ($num/$den)*100;
		
		if(empty($_GET['r'])){					//home page for user.php
			//echo "Continue To UR Voting";
			

			echo "<h2>Hello $user </h2>";
			echo "<h2>Welcome to $name </h2>";
			echo "Voting Progress $bar"."%";
			?>

		<!-- progress bar-->
			
 <h3 id="progress-animated">Voted Progress</h3>
 
            <div class="bs-example">
              <div class="progress progress-striped active">
                <div class="progress-bar" style="width: <?php if(isset($bar)){echo $bar."%";} ?> "></div>
              </div>
            </div>
			</div>
						</div>
						<script src="js/jquery-1.10.2.js"></script>
						<script src="js/bootstrap.js"></script>
						<script src="js/Popover.js"></script>
	<script src="js/Tooltip.js"></script>
						</body>
						</html>
			<?php
			exit();
		}
		else{
			if(!empty($_GET['r'])){				//if any department is selected
				$p = $_GET['r'];				//id of the department
			}
		}
$seat = mysql_query("SELECT * FROM post WHERE `htmlpost` = '$p' ");		//getting information of the department
if(mysql_num_rows($seat) > 0){
	while($department = mysql_fetch_assoc($seat)){
		$db_post = $department['dbpost'];
	}
}

$db_vote = mysql_query("SELECT * FROM `$aa` WHERE `uid` = '$user' ");		//getting user information
while($value = mysql_fetch_assoc($db_vote)){			
$db_r = $value[$db_post];							//checking if user is voted
}

if(isset($_POST['vote'])){							//voting
	$nomid = mysql_real_escape_string ($_POST['code']);			//input of nominee id
	if($nomid){
	if($db_r == 0){
		$db_nomid = mysql_query("SELECT * FROM `$ab` WHERE `nomid` = '$nomid' AND `dep` = '$db_post'");	//updating data of voted nominee
			if(mysql_num_rows($db_nomid) > 0){
				while($check = mysql_fetch_assoc($db_nomid)){	//getting nominee's data
					$db_check = $check['nomid'];
					$db_vot = $check['vote'];		//getting number of votes

						if($db_check == $nomid){
							//mysql_query("UPDATE `$aa` SET `$db_post` = 1 WHERE `uid` = '$user'");
							$vote = $db_vot + 1;			//including vote of the user to nominee
							mysql_query("UPDATE `$ab` SET `vote` = '$vote' WHERE `nomid` = '$nomid' AND `dep` = '$db_post'");	//updating votes to the nominee
							mysql_query("UPDATE `$aa` SET `$db_post` = 1 WHERE `uid` = '$user'");
							$db_r = 1;			//updating user voting activity
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


if($db_r == 1){				//displaying status
		?>
		
			<center>
			<a href="#" class="btn btn-lg btn-success" disabled="disabled" style="width:1000px;">you have voted</a>
			</center>
		
		<?php
		echo "</br> </br>";
	}else{
		if($db_r == 0){}else{			//if any error in database
		echo "Error of r";}
	}
		
		


$sql = mysql_query("SELECT * FROM `$ab` WHERE `dep` = '$db_post' AND `active` = 1");		//getting given dapartment nominee's data
$_SESSION['ag'] = $db_post;
$i = 1;

while($rows = mysql_fetch_assoc($sql)){
$uimage = $rows['image'];			//image location of nominee
$allu = $rows['name'];			//rollno of nominee
$allp = $rows['vote'];			//no of vote of nominee
$alls1 = $rows['sup1'];			//supporter1 for nominee
$alls2 = $rows['sup2'];			//supporter2 for nominee
$alld = $rows['dep'];			//department of nominee
$allid = $rows['nomid'];		//nominee id 
$agenda = $rows['agenda'];		//agenda of nominee

	
?>		<!-- displaying nominees of given department -->




<?php if($i == 1){ ?>
	<div class= "row" >
	<?php } ?>
	<?php 
				switch ($i) {
			case 1:
				?>  
						
						<div class="col-sm-6 col-md-4">
						<div class="thumbnail well">
						<img src=" <?php echo "$uimage"; ?> " style="height:250px;" alt="..." />
						<div class="caption">
						<center><h3> <?php echo "VoterID : $allid"; ?> </h3></center>
						
						<table class="table">
							<tr>
								<td>Name</td>
								<td><?php echo "$allu"; ?></td>
							</tr>
							<tr>
								<td>Department</td>
								<td><?php echo "$alld"; ?></td>
							</tr>
							<tr>
								<td>Vote</td>
								<td><?php echo "$allp"; ?></td>
							</tr>
							<tr>
								<td>Supporter1</td>
								<td><?php echo "$alls1"; ?></td>
							</tr>
							<tr>
								<td>Supporter2</td>
								<td><?php echo "$alls2"; ?></td>
							</tr>
							<tr>
								<td><form action="agenda.php" method="POST"><button type="submit" class="btn btn-danger form-control" name="<?php echo $allu; ?>" >Agenda</button></form></td>
								<td><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="<?php echo $agenda; ?>">HoverOver</button></td>
							</tr>
						</table>
						
						</div>
						</div>
						</div>
				<?php
				$i = 2;
				break;
			case 2:
				?>
						<div class="col-sm-6 col-md-4">
						<div class="thumbnail well">
						<img src=" <?php echo "$uimage"; ?> " alt="..." style="height:250px;" />
						<div class="caption">
						<center><h3> <?php echo "VoterID : $allid"; ?> </h3></center>
						<table class="table">
							<tr>
								<td>Name</td>
								<td><?php echo "$allu"; ?></td>
							</tr>
							<tr>
								<td>Department</td>
								<td><?php echo "$alld"; ?></td>
							</tr>
							<tr>
								<td>Vote</td>
								<td><?php echo "$allp"; ?></td>
							</tr>
							<tr>
								<td>Supporter1</td>
								<td><?php echo "$alls1"; ?></td>
							</tr>
							<tr>
								<td>Supporter2</td>
								<td><?php echo "$alls2"; ?></td>
							</tr>
							<tr>
								<td><form action="agenda.php" method="POST"><button type="submit" class="btn btn-danger form-control" name="<?php echo $allu; ?>" >Agenda</button></form></td>
								<td><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="<?php echo $agenda; ?>">HoverOver</button></td>
							</tr>
						</table>

						</div>
						</div>
						</div>
				<?php
				$i = 3;
				break;
			case 3:
				?>
					<div class="col-sm-6 col-md-4">
					<div class="thumbnail well">
					<img src=" <?php echo "$uimage"; ?> " style="height:250px;" alt="..." />
					<div class="caption">
					<center><h3> <?php echo "VoterID : $allid"; ?> </h3></center>
					<table class="table">
							<tr>
								<td>Name</td>
								<td><?php echo "$allu"; ?></td>
							</tr>
							<tr>
								<td>Department</td>
								<td><?php echo "$alld"; ?></td>
							</tr>
							<tr>
								<td>Vote</td>
								<td><?php echo "$allp"; ?></td>
							</tr>
							<tr>
								<td>Supporter1</td>
								<td><?php echo "$alls1"; ?></td>
							</tr>
							<tr>
								<td>Supporter2</td>
								<td><?php echo "$alls2"; ?></td>
							</tr>
							<tr>
								<td><form action="agenda.php" method="POST"><button type="submit" class="btn btn-danger form-control" name="<?php echo $allu; ?>" >Agenda</button></form></td>
								<td><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="<?php echo $agenda; ?>">HoverOver</button></td>
							</tr>
						</table>

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
	$show = mysql_query("SELECT * FROM `$ab` WHERE `dep` = '$db_post' AND `active` = 1 ");
	if(mysql_num_rows($show)>0){
?>

<form id="voting" action = "" method = "POST">

<div class="form-group">
    <input type="text" class="form-control" name ="code" placeholder="Enter VoterID...">
</div>
<button type="submit" class="btn btn-primary form-control" onClick="return confirm('Are you sure you want to vote');"  id="vote" name="vote" >Vote</button>
</br></br>
</form>
<?php }else{
echo "<center><h3>No Nominees</h3></center>";
}
}
?>
</div>
</div>

</div>
	<!-- JavaScript -->
	
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/Popover.js"></script>
	<script src="js/Tooltip.js"></script>


  </body>
</html>
