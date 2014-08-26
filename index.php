<!DOCTYPE html>
<?php
 
require('config.php');
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>E-Voting System</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" rel="stylesheet" href="cs/bootstrap.css" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Add custom CSS here -->
    <link type="text/css" rel="stylesheet" href="cs/half-slider.css" />
	<link href="cs/jasny-bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php 
if(isset($_POST['contact'])){
$name = strtoupper($_POST['contact_name']);
$email =$_POST['contact_email'];
$hall = $_POST['hall'];
//$roll = $_POST['contact_phone'];
$message = $_POST['contact_message'];
	$dbhall = mysql_query("SELECT * FROM admin WHERE `htmlname` = '$hall'");
	while($hallname = mysql_fetch_assoc($dbhall)){
	$aa = $hallname['dbname'];
	}
if($name && $email && $hall && $message){
	$roll = mysql_query("SELECT * FROM `$aa` WHERE `uid`='$name' AND `email`='$email'");
	if(mysql_num_rows($roll)>0){
		
		$from = "From: $email";
		$body = "message :Name- $name  \n from-$roll \n Message:: $message ";
		if(mail("dosapati.cs12@iitp.ac.in","User $name $roll",$body,$from)){
			$status = "Sucessfully Sent";
		}else{
			$status = "Error in Sending";
		}
	}else{
		$status = "RollNo and EmailID are not matching in given Hostel";
	}
}else{
	$status = "Enter all Fields";
}

}
?>

<div class = "row">
    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">IIT Patna</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="./register/aa.html">About</a>
                    </li>
                    <li><a href="userguide.pdf">Downloads</a>
                    </li>
                    <li><a href="#largeModal" data-toggle="modal">Contact</a>
                    </li>
                </ul>
            </div>
			
			
  
            <!-- /.navbar-collapse -->
        </div>
		
        <!-- /.container -->
    </nav>
</div>
<hr>

    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
		
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('a.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Indian Institute Of Technology Patna</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('b.png');"></div>
                <div class="carousel-caption">
                    <h1>Indian Institute Of Technology Patna</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('c.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Indian Institute Of Technology Patna</h1>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>
	
	
	
    <div class="container">

        <div class="row">
            
                <h1>E-Voting for Gymkhana, IIT Patna</h1>
                <p>E-Voting Team: Sourabh Bhagat,Vinod Dosapati,Yaswanth Duvvuru, Vinayak Bhookya  :</p>
				
				
					<?php
					
						if(empty($_GET['p'])){
							include('login.php');   //including login page
						}
						else{
						if(!empty($_GET['p'])){
						$p = $_GET['p'];            
						 include ($p.'.php');
						}
						else{
							die(mysql_error);
						}
						}
					?>
            
        </div>

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>IIT Patna 2013-14</p>
                </div>
            </div>
        </footer>

    </div>
	
	
	
	  <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Contact Us </h4>
          </div>
          <div class="modal-body">
          <form action="index.php" method="POST">
			<div class="row">
				<div class="col-md-6">
				
	                <label for="input1">RollNo</label>
	                <input type="text" name="contact_name" class="form-control" id="input1">
					 <label for="input2">Email Address</label>
	                <input type="email" name="contact_email" class="form-control" id="input2">
					       <label for="input3">Voting Hostel</label>
						<select name = "hall" class = "form-control" id="input3">
						<?php 
						$gethall = mysql_query("SELECT * FROM admin");
						while($drophall = mysql_fetch_assoc($gethall)){
						$value = $drophall['htmlname'];
						$hallname = $drophall['hallname'];
						?>
						<option <?php echo "value= $value"; ?> > <?php echo "$hallname" ; ?> </option>

						<?php } ?>
						</select>
				</div>
				<div class="col-md-6">
	                <label for="input4">Message</label>
	                <textarea name="contact_message" class="form-control" rows="6" id="input4"></textarea>
	              
				<div class="row">
				
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" name="contact" class="btn btn-primary">Send</button>
					</div>
				
				
				</div>
				</div>
					
			</div>
			<div class="row">
			<center>
			<?php
				if(isset($_POST['contact'])){
				if(isset($status)){
				echo $status;
				}
				
				}
			?>
			
			
			</center>
			
			</div>
			</form>
          </div>
          
        </div>
      </div>
    </div>
	
	
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="jas/jquery-1.10.2.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="jas/bootstrap.js"></script>
	<script src="jas/jasny-bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</body>

</html>
