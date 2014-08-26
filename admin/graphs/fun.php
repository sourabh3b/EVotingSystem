<?php

mysql_connect("localhost","root","");
mysql_select_db("testing");


?>
<?php




$sql="SELECT * FROM nom2 WHERE dep='gs'";
$abc=mysql_query($sql);
$myarray1=array();
$myarray2=array();
$i=0;
while($row=mysql_fetch_array($abc))
{

$a=$row['vote'];
$b=$row['name'];
array_push($myarray1,$a);
array_push($myarray2,$b);
$i=$i+1;

}

$result=count($myarray1);


?>




<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.jpg" />
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'number of votes'],
          
		  ['<?php echo $myarray2[0]; ?>',  <?php echo $myarray1[0]; ?>],
          ['<?php echo $myarray2[1]; ?>',  <?php echo $myarray1[1]; ?>],
          
		  
        ]);

        var options = {
          title: 'VOTING PERFOMANCE ',
          hAxis: {title: 'Name', titleTextStyle: {color: 'red'}}
		  
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
       }
    </script>
	<style>
           body {background-image:url("1.jpg");}
		  div {
               background-image:url("1.jpg");
              }
    </style>
  </head>
  <body>
  
  <center>
    <h1> VOTING PERFOMANCE FOR  gs category</h1> 
    <div id="chart_div" style="width: 400px; height: 300px; margin-left:10px;  margin-top: 10px;"></div>
  </center>




  </body>
</html>