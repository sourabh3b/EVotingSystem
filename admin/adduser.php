<?php


require('sessions.php');                             //including sessions file

?>

<?php 
require('config.php');                                  //including config file

include 'functions.php';                                //including functions file

?>
<html>
<head>
	
	<meta charset="utf-8">
	<title>User Addition</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="An online Voting system">
	<meta name="author" content="Yashwanth">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">                            <!-- styling of body and some components-->
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	  
	  .error{
	  color:#FF0000;
	  }
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>
<body>






<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="adminhme.php"> <img alt="IIT patna" src="img/photo.jpg" /> <span>Online voting</span></a>
				
				<!-- theme selector starts -->
				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
						<li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
					</ul>
				</div>
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="profile.php">Profile</a></li>
						<li class="divider"></li>
						<li><a href="changepwd.php">change password</a></li>
						<li class="divider"></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	
	<div class="container-fluid">
		<div class="row">
		
		
		<div class="col-md-4">
				<div class="span3 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
					<li class="nav-header hidden-tablet">Main</li>
						<li><a class="ajax-link" href="adminhme.php"><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>
						<li><a class="ajax-link" href="addhall.php"><i class="icon-eye-open"></i><span class="hidden-tablet"> Add Hostel</span></a></li>
						<li><a class="ajax-link" href="delhall.php"><i class="icon-edit"></i><span class="hidden-tablet"> Delete Hostel</span></a></li>
						<li><a class="ajax-link" href="addpost.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Add Post</span></a></li>
						<li><a class="ajax-link" href="delpost.php"><i class="icon-font"></i><span class="hidden-tablet"> Remove Post</span></a></li>
						
						<li><a class="ajax-link" href="adduser.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Add user</span></a></li>
						<li><a class="ajax-link" href="deluser.php"><i class="icon-font"></i><span class="hidden-tablet"> Delete User</span></a></li>
						<li><a class="ajax-link" href="seeresults.php"><i class="icon-font"></i><span class="hidden-tablet"> See Results</span></a></li>
						<li><a class="ajax-link" href="graphs.php"><i class="icon-font"></i><span class="hidden-tablet"> View Graphs</span></a></li>
						
					</ul>
					
				</div><!--/.well -->
			</div><!--/span-->
		</div>
		<div class="col-md-4">                     <!--this div is left empty which is righmost part of the page-->
				<center>
			
			</center>
		
		</div>

<?php

require('config.php');

$a="";
$b="";

if(isset($_POST['adduser']))                        //checking if submitted
{

$userid=$_POST['uid'];                             //assigning entered values to new variables
$passwd=$_POST['pass'];
$abcd=$passwd."".$userid;

$abc=$_POST['hall'];

$sql="SELECT * FROM admin WHERE htmlname='$abc'";                  //querying for hal from database
$ab=mysql_query($sql);

$row = mysql_fetch_assoc($ab);
$hal=$row['dbname'];                                            //assigning its database name for a variable

echo $hal;

$uid=mysql_escape_string($_POST['uid']);
$eid=mysql_escape_string($_POST['emailid']);
#$pass=mysql_escape_string($_POST['pass']);
$password=mysql_escape_string($_POST['pass']);

$echeck=split("@",$eid);                                 //splitting email id to check its validation

$sql2="SELECT * FROM  `$hal` WHERE uid='$uid'";            //checking in database of  hall for entered user id
$query = mysql_query($sql2);


  if (empty($_POST["uid"]))
  {
      $a="please enter username";                 //if we leave out username column empty
	}else if(empty($_POST["emailid"]))
	{
	$a="please enter emailid";                    //if we leave out emailid column empty
	}
	elseif(empty($_POST["pass"])){
	$a="please enter password";                  //if we leave out password column empty
	
	}
	elseif(empty($_POST["hall"])){
	$a="please select hall";
	
	}
	 
elseif(mysql_num_rows($query)!=0){
    $a="username already exists";               //after querying in case if user already exists with that username
}	 
elseif(strcmp($echeck[1],"iitp.ac.in")!=0)
{
$a="please enter valid email id";                //checking if he has entered an valid email id or not
}

	  
	  
	  
	  
	  
	  
	  
	  
  else{



$pass=md5($abcd);                    //encrypting a password
$result=mysql_query("INSERT INTO `$hal`(`id` , `uid` , `email` ,`pass` ,`enpass` ) VALUES(NULL, '$uid', '$eid', '$password' ,'$pass' )");	   //inserting values into dtabase of a hall 
		
echo "<center>"."<h3>"."you are added as an user"."</h3>"."</center>";
}
}

?>

		<div class="col-md-4"></div>
	
	<center>
    <span class="error">* Required fields</span><!--form for adding user to the database-->
	<span class="error"><?php echo "*".$a;?></span>
	<form action="" method="post">
<span class="error">*</span>User Id : &nbsp; <input type="text" name="uid"  style="height:25px;">
<br />
<span class="error">*</span>Email Id: &nbsp; <input type="email" name ="emailid" style="height:25px;"><br />


<span class="error">*</span>Password: &nbsp;<input type="password" name="pass" style="height:25px;"><br />

<span class="error">*</span>Select the Hall:  &nbsp;<select name = "hall" class = "form-control">
				<?php                                       //getting all halls from database for dropdown
				$gethall = mysql_query("SELECT * FROM admin");
				while($drophall = mysql_fetch_assoc($gethall)){
				$value = $drophall['htmlname'];
				$hallname = $drophall['hallname'];
				?>
				<option <?php echo "value= $value"; ?> > <?php echo "$hallname" ; ?> </option>

				<?php } ?>
				</select>
				<br />
<input type="submit" name="adduser" value="Add User"><br />
</form>
	
	</center>
	
	</div>
	</div>







	<!-- external javascript
	
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
	
	
	
	
	
	
</body>
</html>