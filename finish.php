<?php 
require('config.php');
include 'functions.php';

if(!register()){            //stop accessing directly
session_destroy();
echo "asd";
header("Location: index.php?p=register"); //redirecting to home registration 
exit();
}
$user = $_SESSION['make'];
$nomhall = $_SESSION['gon'];
$entry = mysql_query("SELECT * FROM `$nomhall` WHERE `name` = '$user' AND `active` = 1 ");
if(mysql_num_rows($entry) > 0){

}else{
header("Location: step2.php");
exit();
}

if(empty($_GET['p'])){
header("Location: index.php?p=finish");      //including in index.php
exit();
}

if(isset($_POST['upload'])){
$agenda = mysql_real_escape_string($_POST['agenda']);
if($agenda){
$filename = $_FILES['pic']['name']; 
$tmp_name = $_FILES['pic']['tmp_name'];

$user = $_SESSION['make'];
$nomhall = $_SESSION['gon'];

	if($filename){
		if(isset($_SESSION['pi'])){
			//session_destroy();
		}
		move_uploaded_file($tmp_name,"uploads/original/".$filename);
		move_uploaded_file($tmp_name,"uploads/thumbs/".$filename);
		$location = "uploads/original/".$filename;
		mysql_query("UPDATE `$nomhall` SET `image` = '$location' WHERE `name` = '$user'");
		mysql_query("UPDATE `$nomhall` SET `agenda` = '$agend' WHERE `name` = '$user'");
		$result = "file is sucessfully uploaded";
		header("Location: profile.php");
	//	session_destroy();
		//exit();
	}else{
		if(isset($_SESSION['pi'])){
			$location = $_SESSION['pi'];
			mysql_query("UPDATE `$nomhall` SET `image` = '$location' WHERE `name` = '$user'");
			mysql_query("UPDATE `$nomhall` SET `agenda` = '$agend' WHERE `name` = '$user'");
			//session_destroy();
			$result = "file is sucessfully uploaded";
			header("Location: profile.php");
			//exit();
		}else{
			$result = "upload a file";
		}
	}
}else{
$result = "Enter agenda";
}
}
//echo $user;
//echo $location = $_SESSION['pi'];



?>
<body>



<div class="container">
<div class="row">

<div class="col-sm-4">
<button type="button" class="btn btn-default btn-lg btn-block" disabled="disabled">Step 1</button>
</div>

<div class="col-sm-4">
<button type="button" class="btn btn-default btn-lg btn-block" disabled="disabled">Step 2</button>
</div>


<div class="col-sm-4">
<button type="button" class="btn btn-primary btn-lg btn-block">Step 3</button>
  
</div>


</div>
</div>

<hr />

<div class="row">
<div class="col-md-4">
<!--Login -->



</div>
<div class="col-md-4">
<div class="row"><div class="col-sm-6">


<form role="form" action="" method="POST" enctype="multipart/form-data" >

<?php if(isset($_SESSION['pi'])){$a= $_SESSION['pi']; } ?> 
<div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
    <img src=" <?php if(isset($a)){echo $a;}else{ echo "uploads/original/img1.jpg"; } ?> " alt="Profile picture">
  </div>
 
  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
  <div>
  
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="pic" /></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>
</div>



</div>
<div class="col-sm-4 col-sm-offset-1">
<a href="index.html" alt="Take snap" title="Camera"><i class="fa fa-camera fa-5x"></i></a>
</div>
</div>

<hr /> 

<?php //include '../cam1/index.html'; ?>
<!-- <h2><a href="index.html">Camera</a></h2> -->
<div class="row">

  <p>Enter Your Agenda</p>
<textarea class="form-control" name = "agenda" rows="3" name="agenda"></textarea>

  </hr>
  
  <button type="submit" class="btn btn-default" name="upload">Submit</button>
 </div>
</form>
<?php if(isset($_POST['upload'])){
if(isset($result)){
echo $result;
}

} ?>


</div>
<div class="col-md-4">
	

</div>

</div>

</body>