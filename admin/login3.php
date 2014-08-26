<div class = "row">
<center><h1>LOGIN</h1></center>
</div>

<div class = "col-xs-4">

<form action="index.php" method="POST">

  <div class="form-group">
    <input type="text" class="form-control" name ="uid" placeholder="Enter Username">
  </div>

  <select name = "hall" class = "form-control">
  <?php 
  $gethall = mysql_query("SELECT * FROM admin");
  while($drophall = mysql_fetch_assoc($gethall)){
  $value = $drophall['htmlname'];
  $hallname = $drophall['hallname'];
  ?>
  <option <?php echo "value= $value"; ?> > <?php echo "$hallname" ; ?> </option>
  
  <?php } ?>
</select></br>

  <div class="form-group">
    <input type="password" class="form-control" name="pass" placeholder="Enter password" />
  </div>
		<?php 
		
		$charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$nextpass = substr(str_shuffle($charset),0,7);
		//$num= rand(1111, 9999);
		$_SESSION['secure'] = $nextpass;
		
		?>
		<center><img src="captcha.php" /></center></br>
		<div class="form-group">
		<input type="text" class="form-control" name="cap" placeholder="Enter the above code" />
		</div>
		
  
  <!--  <input type="submit" class="btn btn-sucess form-control" name="submit" value="Login"></br>-->
<button type="submit" class="btn btn-primary form-control" name="submit" >Login</button>
  
</form>

<?php 
if(isset($_POST['submit']))
echo "$a </br>";
?>
<a href="index.php?p=register" name ="link" value ="Reg">Register as a nommine</a>

</div>

