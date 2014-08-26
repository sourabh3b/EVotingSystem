<?php
session_start();

if(isset($_SESSION['uname'])){                  //if he is logged in.he can continue

}else{
header('Location: login.php');                       //if he is not logged in ,he is redirected to login page
}
if(isset($_SESSION['expiretime'])) {
    if($_SESSION['expiretime'] < time()) {
        header('Location:logout.php');
    }
    else {
        $_SESSION['expiretime'] = time() + 600;                       //here we are setting the session expire time for 10 minutes
    }
	
}

$_SESSION['expiretime'] = time() + 600;


?>
