<?php

$cadena = "this is A test";
$vocales = 0;
$cadenaChar = strtolower($cadena);
$cadenaChar2 = mb_str_split($cadenaChar);

 foreach ($cadenaChar2 as $value) {
   if ($value == "a"|| $value == "e"||$value == "i"||$value == "o"||$value == "u") {
        $vocales++;
    }

 }
echo $vocales;
?>