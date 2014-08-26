<?php

require('config.php');
if(isset($_POST['delete'])){

$postdel=$_POST['postdelete'];
$sql="DELETE FROM posts WHERE postname=$postdel";
$retval = mysql_query($sql);
if(! $retval )
{
  die('Could not delete data: ' . mysql_error());
}
echo "Deleted data successfully\n";

}
?>
<form action="postdeletion.php" method="POST">
<b>Name of the post:</b><input type="text" name="postdelete"><br />
<input type="submit" name="delete" value="Delete">
</form>