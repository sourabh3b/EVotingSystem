<?php
session_start();

if(isset($_SESSION['uname'])){

}else{
header('Location: login.php');
}
if(isset($_SESSION['expiretime'])) {
    if($_SESSION['expiretime'] < time()) {
        header('Location:logout.php');
    }
    else {
        $_SESSION['expiretime'] = time() + 600;
    }
	
}
//maybe add some login procedures and than execute the following line
$_SESSION['expiretime'] = time() + 600;


?>
