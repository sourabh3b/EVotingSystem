<?php
session_start();

if(isset($_SESSION['uname'])){

}else{
header('Location: login.php');
}



?>



<! DOCTYPE html>
<html>

<html lang="en">
<head>
	
	<meta charset="utf-8">
	<title>Stats</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	  
	  
	  div.ex
   {
    width:1000px; 
    padding:10px;
    border:5px solid red;
    margin:50px;
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
				<a class="brand" href="index.html"> <img alt="IIT patna" src="img/photo.jpg" /> <span>Online voting</span></a>
				
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
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
						<li><a href="changepwd.php">change password</a></li>
						<li class="divider"></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				
				<!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						<li><a class="ajax-link" href="adminhme.php"><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>
						<li><a class="ajax-link" href="addhall.php"><i class="icon-eye-open"></i><span class="hidden-tablet"> Add Hostel</span></a></li>
						<li><a class="ajax-link" href="delhall.php"><i class="icon-edit"></i><span class="hidden-tablet"> Delete Hostel</span></a></li>
						<li><a class="ajax-link" href="addpost.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Add Post</span></a></li>
						<li><a class="ajax-link" href="delpost.php"><i class="icon-font"></i><span class="hidden-tablet"> Remove Post</span></a></li>
						<li><a class="ajax-link" href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> See Results</span></a></li>
						
					</ul>
					
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
				
			
    


		
		
	</div><!--/.fluid-container-->

	
	
	
	
<?php
require('config.php');

$sql1="SELECT COUNT(active) FROM hall1 WHERE active=0";
$abc1=mysql_query($sql1);
$result1=mysql_result($abc1,0);
#echo $result1;


$sql2="SELECT COUNT(mess) FROM hall1 WHERE mess=1";
$abc2=mysql_query($sql2);
$result2=mysql_result($abc2,0);
#cho $result2;


$sql3="SELECT COUNT(vote) FROM nom1 WHERE vote=0";
$abc3=mysql_query($sql3);
$result3=mysql_result($abc3,0);
#echo $result3;




?>	
	
<div class="ex">
<h3>Aryabhatta hall</h3>

 The number of users who are  active from aryabhatta hall are <?php echo $result1;?><br />


The number of users from aryabhatta hall are  who have voted for mess category are<?php echo $result2;?><br /> 

The number of nominees who havent got single vote from aryabhatta hall are  <?php echo $result3;?>.<br />



To know more statistics aboout aryabhatta hall,click on the link below .
<a href="aryastats.php">click here</a> 

</div>



<?php
require('config.php');

$ash1="SELECT COUNT(active) FROM hall2 WHERE active=0";
$ashok1=mysql_query($ash1);
$out1=mysql_result($ashok1,0);
#echo $result1;


$ash2="SELECT COUNT(mess) FROM hall2 WHERE mess=1";
$ashok2=mysql_query($ash2);
$out2=mysql_result($ashok2,0);
#echo $result1;

$ash3="SELECT COUNT(vote) FROM nom2 WHERE vote=0";
$ashok3=mysql_query($ash3);
$out3=mysql_result($ashok3,0);
#echo $result1;



?>	



	
	
	<div class="ex">
	
	
	<h3> Ashoka Hall </h3>
	The number of users who are  active from aryabhatta hall are <?php echo $out1;?><br />


The number of users from aryabhatta hall are  who have voted for mess category are<?php echo $out2;?><br /> 

The number of nominees who havent got single vote from aryabhatta hall are  <?php echo $out3;?>.<br />

	click on the link below to know the statistics of Ashoka hall.

<a href="ashstats.php">click here</a> 

</div>




<?php
require('config.php');

$chan1="SELECT COUNT(active) FROM hall3 WHERE active=0";
$han1=mysql_query($chan1);
$var1=mysql_result($han1,0);
#echo $result1;

$chan2="SELECT COUNT(mess) FROM hall3 WHERE mess=1";
$han2=mysql_query($chan2);
$var2=mysql_result($han2,0);
#echo $result1;


$chan3="SELECT COUNT(vote) FROM nom3 WHERE vote=0";
$han3=mysql_query($chan3);
$var3=mysql_result($han3,0);
#echo $result1;


?>









<div class="ex">


<h3> Chanakya Hall </h3>
	The number of users who are  active from aryabhatta hall are <?php echo $var1;?><br />


The number of users from aryabhatta hall are  who have voted for mess category are<?php echo $var2;?><br /> 

The number of nominees who havent got single vote from aryabhatta hall are  <?php echo $var3;?>.<br />




click on the link below to know the statistics of chanakya hall.

<a href="chanstats.php">click here</a> 

</div>


<?php
require('config.php');

$gaut1="SELECT COUNT(active) FROM hall4 WHERE active=0";
$bud1=mysql_query($gaut1);
$budh1=mysql_result($bud1,0);
#echo $result1;


$gaut2="SELECT COUNT(mess) FROM hall4 WHERE mess=1";
$bud2=mysql_query($gaut2);
$budh2=mysql_result($bud2,0);
#echo $result1;


$gaut3="SELECT COUNT(vote) FROM nom4 WHERE vote=0";
$bud3=mysql_query($gaut3);
$budh3=mysql_result($bud3,0);
#echo $result1;


?>



<div class="ex">


<h3> Gautam buddha hall </h3>
	The number of users who are  active from aryabhatta hall are <?php echo $budh1;?><br />


The number of users from aryabhatta hall are  who have voted for mess category are<?php echo $budh2;?><br /> 

The number of nominees who havent got single vote from aryabhatta hall are  <?php echo $budh3;?>.<br />

	


click on the link below to know the statistics of Gautam Buddha hall.

<a href="gautstats.php">click here</a> 

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