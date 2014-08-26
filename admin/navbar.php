<! DOCTYPE html>
<html>
<head>

<title>Admin Home</title>
<meta name="viewport" content="width-device-width, initial-scale=1.0 ">

<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body >

<div class="container">
<div class="navbar navbar-default" role="navigation" >

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only"> toggle navigation</span>
<span class=="icon-bar"></span>
<span class=="icon-bar"></span>
<span class=="icon-bar"></span>
</button>

<a href="navbar.php" class="navbar-brand" >online voting</a>

</div>

<div id="navbar-collapse" class="collapse navbar-collapse"  >
<ul class="nav navbar-nav">
<li class="active" ><a href="navbar.php">Home</a></li>

<li><a href="#">Profile</a></li>
 </ul>
        <ul class="nav navbar-nav navbar-right">
            
        <li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings <b class="caret"></b></a>
			  
			  <ul class="dropdown-menu">
			  <li><a href="changepwd.php">Change Password</a></li>
			  <li><a href="logout.php">Logout</a></li>
			 
			  </ul>
			  </li>

		
		</ul>
</div>

<div id="navbar-collapse" class="collapse navbar-collapse"  >
<ul class="nav nav-pills nav-stacked">


  <li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Select hostel <b class="caret"></b></a>
			  
			  <ul class="dropdown-menu">
			  <li><a href="aryastats.php">Aryabhatta</a></li>
			  <li><a href="ashstats.php">Ashoka</a></li>
			  <li><a href="chanstats.php">chanakya</a></li>
			  <li><a href="gautstats.php">gautam buddha</a></li>
			  </ul>
			  </li>
<li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Post <b class="caret"></b></a>
			  
			  <ul class="dropdown-menu">
			  <li><a href="addpost.php">Add Post</a></li>
			  <li><a href="delpost.php">Delete post</a></li>
			 
			  </ul>
			  </li>
			  
<li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hostel <b class="caret"></b></a>
			  
			  <ul class="dropdown-menu">
			  <li><a href="addhall.php">Add Hostel</a></li>
			  <li><a href="delhall.php">Delete Hostel</a></li>
			 
			  </ul>
			  </li>

<li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#">previous year statistics <b class="caret"></b></a>
			  
			  <ul class="dropdown-menu">
			  <li><a href="#">Aryabhatta</a></li>
			  <li><a href="#">Ashoka</a></li>
			  <li><a href="#">Chanakya</a></li>
			  <li><a href="#">Gautam budhha</a></li>
			 
			  </ul>
			  </li>
			  
			  
			
</div>
</div>





<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>