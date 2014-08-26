
<?php


require('sessions.php');                                  //including sessions file

?>


<?php 
require('config.php');                                     //including config file

include 'functions.php';                                  //including functions file

?>

<html>
<head>
<meta charset="utf-8">
	<title>Post Addition</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="An online Voting system">
	<meta name="author" content="Yashwanth">


	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">    <!--styling of body and its components-->
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
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
		<div class="col-md-6">
				<center>
				<h1><b>Add Post</b></h1>
<form action = "" method = "POST" >

	<!--<label>Hall</label>
	<select name = "hall" class = "form-control">
	<?php                
	$gethall = mysql_query("SELECT * FROM admin");
	while($drophall = mysql_fetch_assoc($gethall)){
	$value = $drophall['htmlname'];
	$hallname = $drophall['hallname'];
	?>
	<option <?php echo "value= $value"; ?> > <?php echo "$hallname" ; ?> </option>

	<?php } ?>
	</select>-->
	                                   <!--form for adding the post into the database-->
	<label>Name of Post</label>
	<div class="form-group">
	<input type="text" class="form-control" name="post" placeholder="Eg: Technical,Cultural,.."  style="height:30px;" />
	</div>
	<label> Database Name of Post</label>
	<div class="form-group">
	<input type="text" class="form-control" name="dbpost" placeholder="Eg: eco,main,cult,...." maxlength = 8  style="height:30px;" />
	</div>
	
	
	<button type="submit" class="btn btn-success form-control" name="dep" >Add Post</button>
	
</form></center>
		
		</div>
		<div class="col-md-4"></div>
	
	
	
	
	
	
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


<?php                                             
if(isset($_POST['dep'])){                                    //checking if user has submitted form
$post = mysql_real_escape_string($_POST['post']);
$dbpost = mysql_real_escape_string($_POST['dbpost']);                //assigning enetered variables to new variables
	if($post && $dbpost){
		if($post != $dbpost){
			$db_post = mysql_query("SELECT * FROM `post` WHERE `post` = '$post'");           //querying if there is already a post with entered name
			if(mysql_num_rows($db_post) > 0){
				echo "Name already taken";                                            //name already exists
			}else{
				$db_dbpost = mysql_query("SELECT * FROM `post` WHERE `dbpost` = '$dbpost'");      //querying if there is a dbname with enetered name
				if(mysql_num_rows($db_dbpost) > 0){
					echo "DataBase Name already taken";        //dbname already exists
				}else{
					
					mysql_query("INSERT INTO `post` (`htmlpost`,`post`,`dbpost`) VALUES('NULL','$post','$dbpost') ");  //inserting enetered values into a database
					$gethall = mysql_query("SELECT * FROM admin");
					while($drophall = mysql_fetch_assoc($gethall)){
						echo $value = $drophall['dbname'];
					if(mysql_query("ALTER TABLE $value ADD $dbpost SMALLINT NOT NULL")){
						
						echo "DONE";
					}
					else{
						echo "no";
					}
					}
					
				}
			}
		}else{
			echo "name must not be same";                     //both names must be different
		}
	}else{
		echo "Fill all fields ...!";                      //check in case if u have left any column empty
	}
}


?>



</html>