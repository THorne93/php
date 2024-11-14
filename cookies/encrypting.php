<?php

$cadena = "password";
$cadena2 = "Taylor";
echo md5($cadena)."<br>";
// echo md5($cadena2)."<br>";

$clave_encrip= password_hash($cadena, PASSWORD_DEFAULT);
echo password_hash($cadena, PASSWORD_DEFAULT);
if (password_verify($cadena, $clave_encrip)) {
    echo "<br> clave correcta";
} else {
    echo "<br> clave incorrecta";
}