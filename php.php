<?php 

$charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@!#%?';
$nextpass = substr(str_shuffle($charset),0,12);
echo $nextpass;
?>