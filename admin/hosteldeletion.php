<?php

require('config.php');
if(isset($_POST['delete'])){

$hostdel=$_POST['hostdelete'];
$sql= mysql_query("DELETE * FROM `hostels` WHERE `name` = $hostdel ");
//$retval = mysql_query($sql);
if(mysql_num_rows($sql) > 0){
echo "there";
}else{
echo "no";
}
exit();
if(!$retval )
{
  die('Could not delete data: ' . mysql_error());
}
echo "Deleted data successfully\n";

}
?>
<form action="hosteldeletion.php" method="POST">
<b>Name of the hostel:</b><input type="text" name="hostdelete" /><br />
<input type="submit" name="delete" value="Delete" />

</form>


  