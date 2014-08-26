<?php session_start();?>


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


<?php



if(isset($_POST['spass'])){
$secpass1 = mysql_real_escape_string($_POST['secpass']);

$ses=$_SESSION['secure'];
if($ses==$secpass1){
header("Location: adminhme.php");
}
else{
header("Location: logout.php");
exit();
}
}
?>

<div class = "container">
<div class="row">
<div class= "col-sm-4 col-sm-offset-4">
<center>
<form  method ="POST">
<label>Confirm Your Entry</label>
<?php $abc=$_SESSION['secure'];

echo $abc."<br />";
?>
<input type = "password" name="secpass" /> </br>

<button type="submit" class="btn btn-primary form-control" name="spass" >Submit OTP Code..!</button></br>

</form>
</center>
</div>
</div>
</div>
</body>
</html>