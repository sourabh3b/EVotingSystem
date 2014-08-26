<h3>for adding hostels</h3>
<?php 
require('config.php');

if(isset($_POST['addhost'])){

$name=$_POST['hostel'];
$num=$_POST['num'];

 $name=mysql_escape_string($name);	 
         $num=mysql_escape_string($num);	

		 
		mysql_query("INSERT INTO `hostels`(`id` , `name` , `students num` ) VALUES(NULL, '$name', '$num')");	

}else{
$form=<<<EOT
<form action="addhostel.php" method="POST">
<b>Name of the Hostel:</b><input type="text" name="hostel"><br />
<b>number of students:</b><input type="text" name="num"><br />
<input type="submit" name="addhost" value="Add hostel">
</form>
EOT;
echo $form;

}
?>
