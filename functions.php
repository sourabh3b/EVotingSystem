<?php 
session_start();   //sessions start


function loggedin(){
		if(isset($_COOKIE['uname']) && isset($_SESSION['user'])){  
			$loggedin = TRUE;
			return $loggedin;
		}
   }
   
   
function register(){
	if(isset($_SESSION['make']) && isset($_SESSION['go']) && isset($_SESSION['gon']) && isset($_SESSION['get']) && isset($_SESSION['got']) && isset($_SESSION['let'])){
			$register = TRUE;
			return $register;
	}
}
   
?>