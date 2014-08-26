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
	<div class="row">
		<div class = "col-sm-4 col-sm-offset-4"><center>
		<h1><b>Add Hostel</b></h1>
			<form action="" method="POST">
				<label>Name of Hall</label>
				<div class="form-group">
				<input type="password" class="form-control" name="pass" placeholder="Eg: Aryabhatta,Ashoka,...."  />
				</div>
				
				<label>Nick Name of Hall</label>
				<div class="form-group">
				<input type="password" class="form-control" name="pass" placeholder="Eg: arya,ashoka,chan" maxlength = 6 />
				</div>
				
				<label>Database Name of Hall for Students</label>
				<div class="form-group">
				<input type="password" class="form-control" name="pass" placeholder="Eg: hall1,hall2,hall3,..." maxlength = 4 />
				</div>
				
				<label>Database Name of Hall for Nominees</label>
				<div class="form-group">
				<input type="password" class="form-control" name="pass" placeholder="Eg: nom1,nom2,nom3,....." maxlength = 4 />
				</div>

				<button type="submit" class="btn btn-primary form-control" name="hostel" >Add Hostel</button>
			
			
			</form>
			</center>
		</div>
	</div>

</div>


</body>
</html>