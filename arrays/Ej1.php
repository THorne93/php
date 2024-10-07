<?php

    $colores = ["rojo","verde","azul","amarillo"];
    
    echo $colores[0]."<br>";
    echo $colores[2]."<br>";
    
    $colores[] = "naranja";
    
    
    for ($i = 0; $i < sizeof($colores); $i++) {
            echo $colores[$i]."<br>";

    }


?>