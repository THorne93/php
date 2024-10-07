<?php

$edades = [20,30,40,25,35];
$numeroBusca = 25;

if (array_search($numeroBusca, $edades) != null) {
    echo array_search($numeroBusca, $edades);
} else echo "no existe el numero";
?>