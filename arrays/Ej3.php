<?php

$numeros=array(3,1,4,1,5,9);

sort($numeros,1);

    for ($i = 0; $i < count($numeros); $i++) {
            echo $numeros[$i]." - ";

    }
    echo "<br>";
    rsort($numeros);
    
        for ($i = 0; $i < count($numeros); $i++) {
            echo $numeros[$i]." - ";

    }

?>