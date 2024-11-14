<?php
session_start();
echo $_SESSION["usuario"]->nombre." ".$_SESSION["usuario"]->apellidos;
?>

