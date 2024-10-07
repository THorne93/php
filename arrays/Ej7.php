<?php

$paises = ["España","Francia","Italia","Alemania","Portugal"];

printArray($paises);

unset($paises[2]);
echo "<br>";
printArray($paises);
echo "<br>";
array_pop($paises);
printArray($paises);
    function printArray($paises) {
        foreach ($paises as $value) {
            echo $value."<br>";
        }
    }
?>