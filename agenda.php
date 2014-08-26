<?php 
require('config.php');				//connecting database
include 'functions.php';			//checking if logged in
if(!loggedin()){
header("Location: logout.php");			//redirecting to logout.php
exit();
}

$user = $_SESSION['user'];			//getting sessions data(user)
$hall = $_SESSION['hall'];			//getting sessions data(hostel)

	$dbhall = mysql_query("SELECT * FROM admin WHERE `htmlname` = '$hall'");	//getting datbase names of the hostel
	while($hallname = mysql_fetch_assoc($dbhall)){
	$aa = $hallname['dbname'];
	$ab = $hallname['nomhall'];
	$name = $hallname['hallname'];
	}

$check = mysql_query("SELECT * FROM `$aa` WHERE `uid` = '$user' AND `active` = 2");	//checking user and activity
if(mysql_num_rows($check) > 0 ){

//mysql_query("UPDATE `$aa` SET `active`= 2 WHERE `uid` = '$user'");
}else{
header("Location: logout.php");
exit();
}
$dept = $_SESSION['ag'];
$regnom = mysql_query("SELECT * FROM `$ab` WHERE `active` = 1 AND `dep` = '$dept' ");
while($get = mysql_fetch_assoc($regnom)){
$roll = $get['name'];
if(isset($_POST[$roll])){
$_SESSION['roll'] = $roll;
$reqnom = mysql_query("SELECT * FROM `$ab` WHERE `active` = 1 AND `dep` = '$dept' AND `name`='$roll' ");
$array = mysql_fetch_assoc($reqnom);
$image = $array['image'];
$agenda = $array['agenda'];

}
}

if(isset($_POST['agenda'])){
$com = mysql_real_escape_string($_POST['com']);
$len = strlen($com);
if(($len > 1) && ($len < 201) && $com ){
	$roll = $_SESSION['roll'];
	$comment = mysql_query("SELECT * FROM `comm` WHERE `nom` = '$roll'");
	$detail = mysql_fetch_assoc($comment);
	$count = $detail['count'];

	$chkcount = mysql_query("SELECT * FROM `comm` WHERE `count` > '$count' ");
	$count = $count +1;
	$gocom = $user.":@@:".$com;
	if(mysql_num_rows($chkcount)>0){
		if(mysql_query("UPDATE `comm` SET `$count`= '$gocom' WHERE `nom` = '$roll'")){
			//$status = "yeh1";
		}else{
			//$status ="No1";
		}
	}else{
		if(mysql_query("ALTER TABLE `comm` ADD `$count` varchar(255) NOT NULL")){
			if(mysql_query("UPDATE `comm` SET `$count`= '$gocom' WHERE `nom` = '$roll'")){
				//$status = "yeh2";
			}else{
				//$status ="No2";
			}
		}
	}
mysql_query("UPDATE `comm` SET `count`= '$count' WHERE `nom` = '$roll'");
}else{
 $status = "Comment size limit 16-200";
}
}


?>


<!doctype html>
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

	<style >
	p:first-letter {
    margin-left: 1em;
}
	
	   
	  .page-data .p
	  {
		  height:auto;
		  width:auto;	 	
	       margin: 0 0 0 0; 
	       border: 1px solid #e1e1e1;
	  }
	   .comment-insert
	   {
	          width:auto;
			  height:100px;
			   border:1px solid #e1e1e1;
	          margin:10px;
			   position: relative;
	   }
	 
		 .comment-insert textarea.comment-insert-text
		 {
		     position: absolute;
			 top:0px;
			 bottom:0px;
			 left:0px;
			 right:0px;
			 border: none;
			 width:99%;
			  height:100%;
			  color: #555 ;
		 }
		 
		  .comment-insert textarea.comment-insert-container
		 {
		     margin: 5px 10px 5px 10px; 
			 border: 1px solid #e1e1e1;
			 width:auto;
			  min-height:100px;
			  position: relative;
		 }
		 
		 .comment-post-btn-wrapper
		 {
		     position: absolute;
			 top:0px;
			 right:10px;
			 width:100px;
			 height:25px;
			 line-height:27px;
			 background: #6989CC;
			 color: #ffffff;
			 font-size:14px;
			 text-align:center;
			 cursor:pointer;
		 }	 
	   
	   body
	   {
	        
			 background: #FFFFFF;
	   }
	  .wrapper
	  {
	     background:#c7c7c7;
		  width:600px;
		  border:1px solid #a1a1a1;
		  margin:10px auto 10px auto;
		  height:auto;
	  }
	
	   .comment-wrapper
	  {
	  width:auto;
	  height:auto;	  
	  margin:10px;
	  border:1px solid #e1e1e1;
	  color:#444;
	  }
	  h3.comment-title
	  {
	  height:40px;
	  line-height:37px;
	  font-size:14px;
	  margin:0 5px 0 5px;
	  color:#555;
	  border-bottom:1px solid #e1e1e1;
	  }
	  
	  .comments-list
	  {
	  height:auto;
	  font-size:13px;
	  margin:10px 5px 5px 5px;
	  color:#555;
	  }
	  
	  ul.comments-holder-ul
	  {
	     list-style-type:none;
		 margin:0px;
		 padding:0px;
		 width:auto;
		 height:auto;
		 overflow:hidden;
	  }
	  
	    ul.comments-holder-ul li.comment-holder
	  {
	     list-style-type:none;
	
		 margin:5px 0 10px 0;
		 width:auto;
		 height:auto;
		  border:1px solid #e1e1e1;
		   overflow:hidden;
		   position:relative;
	  }
	
	    
	      ul.comments-holder-ul li.comment-holder h3.username-field
	  {
		 height:25px;
		 line-height:22px;
		 color:#2E5CB8;
		 margin:0 0 0 10px;
		 font-size:11px;		 
	  }
	  
	   ul.comments-holder-ul li.comment-holder  .comment-text
	   {
	      width:auto;
		  display:block;
		  font-size:11px;
		  margin 0 10px 10px 75px;
		  word-wrap:normal;
	   }
	   .comment-body
	   {
	       width:auto;
	   }
	   
       
	</style>
      
</head>
<body>
<?php 
if(isset($_SESSION['roll'])){
$roll = $_SESSION['roll'];
$reqnom = mysql_query("SELECT * FROM `$ab` WHERE `active` = 1 AND `dep` = '$dept' AND `name`='$roll' ");
$array = mysql_fetch_assoc($reqnom);
$image = $array['image'];
$agenda = $array['agenda'];

}
if(isset($status)){
echo $len;
echo $status;
}


?>
            <div class="wrapper">
			    <div class="page-data">
				<form action="user.php"><button type="submit" class="btn btn-primary form-control">Continue Voting</button></form>
			       <center> <h1>Agenda</h1> </center>
				   <hr>
				   <p><h4><b><?php echo "===>  ".$agenda; ?></b></h4> </p>
				   
                </div>
				 <div class="comment-wrapper">
				       <h3 class="comment-title">User Feedback.</h3>
				        <form action="" method="POST">
						 <div class="comment-insert">							  
							  <div class="comment-insert-container">
							      <textarea class="comment-insert-text" name="com"> </textarea>	
				                </div>
								
								<div class="comment-post-btn-wrapper">
								 <button type="submit" class="btn btn-success form-control" name="agenda" >POST</button>
								 </div>
						  </div>
						  </form>
						  
						  
						 
                         <div class="comments-list">
						     <ul class="comments-holder-ul">
							  
									<?php 
									$reply = mysql_query("SELECT * FROM `comm` WHERE `nom`= '$roll' AND `count` > 0");
									if(mysql_num_rows($reply) > 0){
									$get = mysql_fetch_assoc($reply);
									$total = $get['count'];
									for($i =1; $i<=$total;$i++){
									$line = $get[$i];
									$part = explode(':@@:',$line);
									$ruser = $part[0];
									$rcom = $part[1];
									?>
								   <li class="comments-holder" id="_1"> 
										  <div class="comment-body">
										        <h4 class="username-field">
										       <?php echo $ruser; ?> 
										          </h4>	 
										         <div class="comment-text">
										         <b><?php echo $rcom; ?></b>
										          </div>	 
										   
										 </div>
										
										
								  </li>
								  
								  <hr>
								  
								<?php

								}
								}
								?>

							</ul>	  
						 
				  </div>
			</div>	
</body>
</html>






