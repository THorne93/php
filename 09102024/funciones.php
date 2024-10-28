<?php

function createMatrix($filas, $columnas) {
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            $m[$i][$j] = (rand(1, 10));
        }
    }
    return $m;
}

function showMatrix($m) {
    echo "<h1>MATRIZ GENERADA</h1>";
    echo "<table>";
    foreach ($m as $indF => $fila) {
        echo "<tr>";

        foreach ($fila as $indC => $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function sumarFilas($m) {
    
    foreach ($m as $indF => $fila) {
        $numTemp = 0;

        foreach ($fila as $indC => $value) {
            $numTemp = $numTemp + $value;
        }
        echo "La suma de la fila ".$indF." es: ".$numTemp."<br>";
    }
    
}
function sumarFilas2($m) {
    
    foreach ($m as $indF => $fila) {
        $numTemp = 0;

        foreach ($fila as $indC => $value) {
            $numTemp = $numTemp + $value;
        }
        $a[] = $numTemp;
    }
    return $a;
    
}
function sumarColumnas($m) {
    
    $columnas = count($m[0]);
    $filas = count($m);
    for ($i = 0; $i < $columnas; $i++) {
        $numTemp = 0;
        for ($j = 0; $j < $filas; $j++) {
            $numTemp = $numTemp + $m[$j][$i];
        }
        $a[] = $numTemp;
    }
    return $a;
    
}

function readArray($a) {
    foreach ($a as $key => $value) {
        echo "La suma de la columna ".$key." es: ".$value."<br>";
    }
}

function sumarTodasFilas($m) {
    $numTot = 0;
    foreach ($m as $indF => $fila) {
        $numTemp = 0;

        foreach ($fila as $indC => $value) {
            $numTemp = $numTemp + $value;
            $numTot = $numTot + $value;
        }
        echo "La suma de la fila ".$indF." es: ".$numTemp."<br>";
    }
    echo "La suma de todas las filas es: ".$numTot."<br>";
    
}
function sumarTodasColumnas($m) {
    $numTot = 0;
    $columnas = count($m[0]);
    $filas = count($m);
    for ($i = 0; $i < $columnas; $i++) {
        $numTemp = 0;
        for ($j = 0; $j < $filas; $j++) {
            $numTemp = $numTemp + $m[$j][$i];
            $numTot = $numTot + $m[$j][$i];
        }
        echo "La suma de la columna ".$i." es: ".$numTemp."<br>";
    }
    echo "La suma de todas las Columnas es: ".$numTot;
    
}

?>