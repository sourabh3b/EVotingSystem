<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>My Site 'Vinod'</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" rel="stylesheet" href="cs/bootstrap.css" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Add custom CSS here -->
    <link type="text/css" rel="stylesheet" href="cs/half-slider.css" />
	<link href="cs/jasny-bootstrap.min.css" rel="stylesheet">

</head>

<body>
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
                    <li><a href="#about">About</a>
                    </li>
                    <li><a href="#services">Services</a>
                    </li>
                    <li><a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</div>

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
                    <h1>COBIE</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('c.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Barney(N.P)</h1>
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
                <p>E-Voting Team: Vinod Dosapati,Yaswanth Duvvuru, Vinayak Bhookya, Sourab Bhagath :</p>
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
