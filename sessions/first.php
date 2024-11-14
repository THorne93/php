<?php


session_start();
echo session_name()."<br>";
echo session_id();
session_destroy();

setcookie($_PHPSESSID,'', time() -3600,"/"); //remove from client side
?>





