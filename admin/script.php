<html>
<body>
<?php


require('config.php');
$sql="SELECT * FROM nom1";
$abc=mysql_query($sql);
?>
<script>
var myarray=new array();

</script>
<?php
$i=0;
while($row=mysql_fetch_array($abc)){

$b=$row['vote'];

?>
<script>
var b=<?php echo $b;?>;
 var a=<?php echo $i; ?>;
 //document.write(a+ "<br>");
 //document.write(b+ "<br>");
 var l=b;
 document.write(l+ "<br>");
myarray[a]= l;
document.write(myarray[] + "<br>");
</script>
<?php
$i=$i+1;
#echo $i;
}

?>

<script>

/*var p=myarray.length;
document.write(p + "<br>");
for (var k=0;k<myarray.length;k++)
{ 
document.write(myarray[k] + "<br>");
}*/

</script>

</body>
</html>