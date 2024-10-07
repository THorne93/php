<?php

    $palabras = ["Palo","Papel","Tarta","Papel","Tarta","Fruta","Fruta"];
    
    for ($i = 0; $i < count($palabras); $i++) {
        for ($j = count($palabras) - 1 ; $j > $i; $j--) {
            if ($palabras[$i] === $palabras[$j]) {
                array_splice($palabras,$j,1);
            }
        }
        
}   
    
foreach ($palabras as $value) {
    echo $value."<br>";
}

?>