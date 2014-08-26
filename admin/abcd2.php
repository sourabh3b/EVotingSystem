<?php



require('config.php');




if(isset($_POST['change'])){

echo "hello";
$uname=$_POST['username'];
$pass1=$_POST['current'];
$pass2=$_POST['new'];
$pass3=$_POST['new2'];

$sql="SELECT password FROM admins WHERE name='$uname'";
$abc=mysql_query($sql);



if($abc){

if)

}
else{
echo "the user doesnot exist";
}
#header('Location:adminhme.php');
}
else{
$form=<<<EOT



<form method="POST">
Username:<input type="text" name="username"><br />
Enter ur present password:<input type="password" name="current"><br />

Enter your new password:<input type="password" name="new"><br />

ReEnter your new password:<input type="password" name="new2"><br />

<input type="submit" name="change" value="Change">
</form>

EOT;

echo $form;			

}
?>