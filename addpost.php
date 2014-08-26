<?php 
require('config.php');

include 'functions.php';

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Site 'Vinod'</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" rel="stylesheet" href="cs/bootstrap.css" />

    <!-- Add custom CSS here -->
    <link type="text/css" rel="stylesheet" href="cs/half-slider.css" />

</head>
<body>
<div class="container">
<div class="row"><center>
<div class= "col-sm-4 col-sm-offset-4">
<h1><b>Add Post</b></h1>
<form action = "" method = "POST" >

	<label>Hall</label>
	<select name = "hall" class = "form-control">
	<?php 
	$gethall = mysql_query("SELECT * FROM admin");
	while($drophall = mysql_fetch_assoc($gethall)){
	$value = $drophall['htmlname'];
	$hallname = $drophall['hallname'];
	?>
	<option <?php echo "value= $value"; ?> > <?php echo "$hallname" ; ?> </option>

	<?php } ?>
	</select>
	
	<label>Name of Post</label>
	<div class="form-group">
	<input type="password" class="form-control" name="pass" placeholder="Eg: Technical,Cultural,.."  />
	</div>
	<label> Database Name of Post</label>
	<div class="form-group">
	<input type="password" class="form-control" name="pass" placeholder="Eg: eco,main,cult,...." maxlength = 4 />
	</div>
	
	<!--<label>Nick Name of Post</label>
	<div class="form-group">
	<input type="password" class="form-control" name="pass" placeholder="Eg: 1,2,3,... " maxlength = 4 />
	</div>-->
	
	<button type="submit" class="btn btn-primary form-control" name="dep" >Add Post</button>
	
</form></center>
</div>
</div>
</div>
</body>
</html>