<?php 
require('config.php');

include 'functions.php';


$gethall = mysql_query("SELECT * FROM `admin`");
while($get = mysql_fetch_assoc($gethall)){
	$hall = $get['dbname'];
	$std = mysql_query("SELECT * FROM `$hall` ");
	while($getstd = mysql_fetch_assoc($std)){
		$flag = 0;
		$user = $getstd['uid'];
		$email = $getstd['email'];
		$getpost = mysql_query("SELECT * FROM `post`");
		while($post = mysql_fetch_assoc($getpost)){
			$dep = $post['dbpost'];
			$check = mysql_query("SELECT * FROM `$hall` WHERE `uid` = '$user' AND `$dep` = 0");
			if(mysql_num_rows($check) > 0){
				$flag = $flag+1;

			}
		}
		if($flag > 0){
			$to = $email;
			$sub ="Gymkhana Elections";
			$from = "From: vinoddosapati02@gmail.com";
			$body = "$user ,you havent Completed your election";
		}else{
			$to = $email;
			$sub ="Gymkhana Elections";
			$from = "From: vinoddosapati02@gmail.com";
			$body = "ThankYou $user ,you have Completed your election";
		}
		mail($to,$sub,$body,$from);
	}

}

?>