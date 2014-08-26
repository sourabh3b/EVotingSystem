<?php

mysql_connect("localhost","root","vinoddosapati");
mysql_select_db("trail");


?>
<?php



$sql="SELECT * FROM nom2 WHERE dep='gs'";
$abc=mysql_query($sql);
$gs_votes=array();
$gs_name=array();
$i=0;
while($row=mysql_fetch_array($abc))
{

$a=$row['vote'];
$b=$row['name'];
array_push($gs_votes,$a);
array_push($gs_name,$b);
$i=$i+1;

}

$result=count($gs_votes);


?>




<html>
  <head>
  <!-- this graph is for the gs category aryabhatta hall-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.jpg" />
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'number of votes'],
          
		  ['<?php echo $gs_name[0]; ?>',  <?php echo $gs_votes[0]; ?>],
           ['<?php echo $gs_name[1]; ?>',  <?php echo $gs_votes[1]; ?>],
		    ['<?php echo $gs_name[2]; ?>',  <?php echo $gs_votes[2]; ?>],
          
		  
        ]);

        var options = {
          title: 'VOTING PERFOMANCE ',
          hAxis: {title: 'Name', titleTextStyle: {color: 'red'}}
		  
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
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
  
  
  
  
  <?php



$sql="SELECT * FROM nom2 WHERE dep='tech'";
$abc=mysql_query($sql);
$tech_votes=array();
$tech_name=array();
$i=0;
while($row=mysql_fetch_array($abc))
{

$a=$row['vote'];
$b=$row['name'];
array_push($tech_votes,$a);
array_push($tech_name,$b);
$i=$i+1;

}

$result=count($tech_votes);


?>
  
  
  
  
  <head>
  <!-- this graph is for the tech category aryabhatta hall-->
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
	<link rel='shortcut icon' type='image/x-icon' href='favicon.jpg' />
    <script type='text/javascript'>
      google.load('visualization', '1', {packages:['corechart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'number of votes'],
          
		  ['<?php echo $tech_name[0]; ?>',  <?php echo $tech_votes[0]; ?>],
		    ['<?php echo $tech_name[1]; ?>',  <?php echo $tech_votes[1]; ?>],
          
		  
        ]);

        var options = {
          title: 'VOTING PERFOMANCE ',
          hAxis: {title: 'Name', titleTextStyle: {color: 'red'}}
		  
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
       }
    </script>
	<style>
           body {background-image:url('1.jpg');}
		  div {
               background-image:url('1.jpg');
              }
    </style>
  </head>
  
  <?php



$sql="SELECT * FROM nom2 WHERE dep='mess'";
$abc=mysql_query($sql);
$mess_votes=array();
$mess_name=array();
$i=0;
while($row=mysql_fetch_array($abc))
{

$a=$row['vote'];
$b=$row['name'];
array_push($mess_votes,$a);
array_push($mess_name,$b);
$i=$i+1;

}

$result=count($mess_votes);


?>
  
  
  
  
  
  <head>
  <!-- this graph is for the mess category aryabhatta hall-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.jpg" />
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'number of votes'],
          
		  
           ['<?php echo $mess_name[0]; ?>',  <?php echo $mess_votes[0]; ?>],
		    ['<?php echo $mess_name[1]; ?>',  <?php echo $mess_votes[1]; ?>],
		  
        ]);

        var options = {
          title: 'VOTING PERFOMANCE ',
          hAxis: {title: 'Name', titleTextStyle: {color: 'red'}}
		  
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div3'));
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
  
  
  
  <?php



$sql="SELECT * FROM nom2 WHERE dep='litrature'";
$abc=mysql_query($sql);
$lit_votes=array();
$lit_name=array();
$i=0;
while($row=mysql_fetch_array($abc))
{

$a=$row['vote'];
$b=$row['name'];
array_push($lit_votes,$a);
array_push($lit_name,$b);
$i=$i+1;

}

$result=count($lit_votes);


?>
  
  
   <head>
  <!-- this graph is for the lit category aryabhatta hall-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.jpg" />
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'number of votes'],
          
		  
           ['<?php echo $lit_name[0]; ?>',  <?php echo $lit_votes[0]; ?>],
		    
        ]);

        var options = {
          title: 'VOTING PERFOMANCE ',
          hAxis: {title: 'Name', titleTextStyle: {color: 'red'}}
		  
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div4'));
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
  
  
  
  
  <?php



$sql="SELECT * FROM nom2 WHERE dep='sports'";
$abc=mysql_query($sql);
$sports_votes=array();
$sports_name=array();
$i=0;
while($row=mysql_fetch_array($abc))
{

$a=$row['vote'];
$b=$row['name'];
array_push($sports_votes,$a);
array_push($sports_name,$b);
$i=$i+1;

}

$result=count($sports_votes);


?>
  
   <head>
  <!-- this graph is for the sports category aryabhatta hall-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.jpg" />
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'number of votes'],
          
		  
           ['<?php echo $sports_name[0]; ?>',  <?php echo $sports_votes[0]; ?>],
		  
		  
        ]);

        var options = {
          title: 'VOTING PERFOMANCE ',
          hAxis: {title: 'Name', titleTextStyle: {color: 'red'}}
		  
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div5'));
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
  
  
  
  
  <?php



$sql="SELECT * FROM nom2 WHERE dep='cult'";
$abc=mysql_query($sql);
$cult_votes=array();
$cult_name=array();
$i=0;
while($row=mysql_fetch_array($abc))
{

$a=$row['vote'];
$b=$row['name'];
array_push($cult_votes,$a);
array_push($cult_name,$b);
$i=$i+1;

}

$result=count($cult_votes);


?>
  
   <head>
  <!-- this graph is for the cult category aryabhatta hall-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.jpg" />
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'number of votes'],
          
		  
           ['<?php echo $cult_name[0]; ?>',  <?php echo $cult_votes[0]; ?>],
		   
        ]);

        var options = {
          title: 'VOTING PERFOMANCE ',
          hAxis: {title: 'Name', titleTextStyle: {color: 'red'}}
		  
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div6'));
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
  
  
  
  
  <?php



$sql="SELECT * FROM nom2 WHERE dep='main'";
$abc=mysql_query($sql);
$main_votes=array();
$main_name=array();
$i=0;
while($row=mysql_fetch_array($abc))
{

$a=$row['vote'];
$b=$row['name'];
array_push($main_votes,$a);
array_push($main_name,$b);
$i=$i+1;

}

$result=count($main_votes);


?>
   <head>
  <!-- this graph is for the main  category aryabhatta hall-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.jpg" />
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'number of votes'],
          
		  
           ['<?php echo $main_name[0]; ?>',  <?php echo $main_votes[0]; ?>],
		   
           
        ]);

        var options = {
          title: 'VOTING PERFOMANCE ',
          hAxis: {title: 'Name', titleTextStyle: {color: 'red'}}
		  
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div7'));
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
  
  
  
   <?php



$sql="SELECT * FROM nom2 WHERE dep='heal'";
$abc=mysql_query($sql);
$heal_votes=array();
$heal_name=array();
$i=0;
while($row=mysql_fetch_array($abc))
{

$a=$row['vote'];
$b=$row['name'];
array_push($heal_votes,$a);
array_push($heal_name,$b);
$i=$i+1;

}

$result=count($heal_votes);


?>


 <head>
  <!-- this graph is for the heal category aryabhatta hall-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.jpg" />
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'number of votes'],
          
		  
        
           ['<?php echo $heal_name[0]; ?>',  <?php echo $heal_votes[0]; ?>],
		   
		  
        ]);

        var options = {
          title: 'VOTING PERFOMANCE ',
          hAxis: {title: 'Name', titleTextStyle: {color: 'red'}}
		  
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div8'));
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
    <h1> VOTING PERFOMANCE for GS category</h1> 
    <div id="chart_div1" style="width: 400px; height: 300px; margin-left:10px;  margin-top: 10px;"></div>
	
	<h1> VOTING PERFOMANCE for tech category</h1> 
	<div id="chart_div2" style="width: 400px; height: 300px; margin-left:10px;  margin-top: 10px;"></div>
	
	<h1> VOTING PERFOMANCE for mess category</h1> 
	<div id="chart_div3" style="width: 400px; height: 300px; margin-left:10px;  margin-top: 10px;"></div>
	
	<h1> VOTING PERFOMANCE for lit category</h1> 
	<div id="chart_div4" style="width: 400px; height: 300px; margin-left:10px;  margin-top: 10px;"></div>
	
	<h1> VOTING PERFOMANCE for sports category</h1> 
	<div id="chart_div5" style="width: 400px; height: 300px; margin-left:10px;  margin-top: 10px;"></div>
	
	<h1> VOTING PERFOMANCE for cult category</h1> 
	<div id="chart_div6" style="width: 400px; height: 300px; margin-left:10px;  margin-top: 10px;"></div>
	
	<h1> VOTING PERFOMANCE for main category</h1> 
	<div id="chart_div7" style="width: 400px; height: 300px; margin-left:10px;  margin-top: 10px;"></div>
	
	<h1> VOTING PERFOMANCE for heal category</h1> 
	<div id="chart_div8" style="width: 400px; height: 300px; margin-left:10px;  margin-top: 10px;"></div>
	
	
  </center>







  </body>
</html>