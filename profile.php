<!doctype html>
<html lang="en">
<?php 
require('config.php');
include 'functions.php';

if(register()){            //stop accessing directly

}else{
session_destroy();
header("Location: index.php?p=register");
exit();
}

$user = $_SESSION['make'];
$nomhall = $_SESSION['gon'];

$done = mysql_query("SELECT * FROM `$nomhall` WHERE `name` = '$user' AND `active` = 1");
if(mysql_num_rows($done) > 0){

	$get=mysql_fetch_assoc($done);
	$name = $get['name'];
	$nomid = $get['nomid'];
	$dep = $get['dep'];
	$sup1 = $get['sup1'];
	$sup2 = $get['sup2'];
	$status = "Under Verification";
	$pic = $get['image'];
	
	
}else{
//session_destroy();
header("Location: index.php?p=register");
exit();
}

?>

<head>
   <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>My Site 'Vinod'</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" rel="stylesheet" href="cs/bootstrap.css" />

    <!-- Add custom CSS here -->
    <link type="text/css" rel="stylesheet" href="cs/half-slider.css" />
	<link href="cs/jasny-bootstrap.min.css" rel="stylesheet">	
</head>
<body>
    <!-- Section 4 -->    

    <div class="section4" id="section4">
        <div class="container">
            <div class="row">
                <div class="span12">
                   <center> <h1>Information of candidate</h1> </center><hr/>
					 <div class="span6 offset1" >
					 <?php if(!isset($pic)){ $pic = "uploads/original/img1.jpg";} ?>
                   <img border="1" src=" <?php echo $pic; ?> "  width="100" height="100" style="margin-left:500px">
                </div>
                </div>
            </div>            
            <div class="row">
                <div class="span4">
   <center>               
<table style="width:400px" cellspacing="8" cellpadding="10" >
<tr>
  <td>Roll No</td>
  <td>:</td>
  <td> <?php if(isset($name)){echo $name;}else{echo "no name";} ?> </td>		
 
  </tr>
<tr>
  <td>Nominee ID</td>
  <td>:</td>
  <td> <?php if(isset($nomid)){echo $nomid;}else{echo "no nomid";} ?> </td>		
  
</tr>
<tr>
  <td>Department</td>
  <td>:</td>
  <td><?php if(isset($dep)){echo $dep;}else{echo "no department";} ?></td>		
  
</tr>
<tr>
  <td>Supporter 1</td>
  <td>:</td>
  <td> <?php if(isset($sup1)){echo $sup1."(Verified)";}else{echo "no Supporter1";} ?> </td>		
 
  </tr>
<tr>
  <td>Supporter 2</td>
  <td>:</td>
  <td> <?php if(isset($sup2)){echo $sup2."(Verified)";}else{echo "no supporter 2";} ?> </td>		
  
</tr>
<tr>
  <td>Status</td>
  <td>:</td>
  <td> <?php if(isset($status)){echo $status;}else{echo "no status";} ?> </td>		
  
</tr>

</table>
<br /> 
<button onclick="myFunction()">Print this page</button>
</center>
                </div>                              
            </div>                      
        </div>
    </div>  
    
    <!-- All JavaScript Files -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->

<?php 
session_destroy();

?>




<script>
function myFunction()
{
window.print();
}
</script>
    
</body>
</html>