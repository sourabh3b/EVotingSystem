<html>
<head>
<style>
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
<!-- Table goes in the document BODY -->



</head>
<body>









<?php
require('config.php');




$sql="SELECT * FROM post";
$abc=mysql_query($sql);
while($row=mysql_fetch_array($abc)){


$dept=$row['dbpost'];
echo "<h4>".$row['post']."</h4>"."<br />";


$sql2="SELECT * FROM nom2 where dep='$dept'";
$abc2=mysql_query($sql2);


if(mysql_num_rows($abc2)==0){

echo "No candidate has nominated for this category"."<br />";

}else{

while($row2=mysql_fetch_array($abc2)){
echo "<table border='1' class='gridhouse'>
<tr>
<th>Id</th>
<th>Name</th>
<th>supporter1</th>
<th>supporter2</th>
<th>nomid</th>
<th>vote</th>
</tr>";


echo "<tr>";
echo "<td>" . $row2['id'] . "</td>";
echo "<td>" . $row2['name'] . "</td>";
echo "<td>" . $row2['sup1'] . "</td>";
echo "<td>" . $row2['sup2'] . "</td>";
echo "<td>" . $row2['nomid'] . "</td>";
echo "<td>" . $row2['vote'] . "</td>";
echo "</tr>";

echo "</table>";
}
}
}
?>


</body>
</html>