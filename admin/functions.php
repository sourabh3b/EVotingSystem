<?php 

function loggedin(){
		if( isset($_SESSION['uname'])){
			$loggedin = TRUE;
			return $loggedin;
		}
   }
?>