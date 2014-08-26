<?php
session_start();

if(isset($_SESSION['uname'])){


header('Location: adminhme.php');

}else{
header('Location: login.php');
}



?>