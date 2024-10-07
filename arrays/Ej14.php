<?php

    $palabras = ["Palo","Papel","Tarta","Papel","Tarta","Fruta"];
    
   
$frequencias = [];

foreach ($palabras as $value) {
    if (isset($frequencias[$value])) {
        $frequencias[$value]++;
    } else {
        $frequencias[$value] = 1;
    }
}

foreach ($frequencias as $palabra => $frequencia) {
    echo $palabra." - ".$frequencia."<br>";
}


?>