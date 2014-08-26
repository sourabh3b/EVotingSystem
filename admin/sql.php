<?php


require('config.php');

if(isset($_POST['submit'])){


$uname=$_POST['username'];



$sql="SELECT * FROM admins WHERE name='$uname'";
$abc=mysql_query($sql);


$abcd=mysql_fetch_array($abc);
echo $d = $abcd['name'];

if($uname == $d){
echo "Hello";
}
else{
echo "wrong username";
}



}

else{

$form=<<<EOT

<form method="POST">
Username:<input type="text" name="username"><br />

<input type="submit" name="submit" value="Submit">
</form>

EOT;
echo $form;

}
?>