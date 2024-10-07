<?php

$matriz[0][1] = "pepé";
$matriz[0][2] = "Juan";
$matriz[0][3] = "HARRY";
$matriz[1][5] = "HARRY";
$matriz[1][6] = "HARRY";
foreach ($matriz as $indF => $fila) {
echo $indF."<br>";
foreach ($fila as $indC => $value) {
echo "<br>".$indC."-".$value;
}
echo "<br>";
}
echo "<br>";
echo "Filas".count($matriz)."<br>";       // counts rows
// echo "Columnas".count($matriz[1])."<br>";       //counts columns in a row
echo "Total: ".count($matriz, 1);           // counts total elements

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$matriz2 = array(
0 => array("codigo" => 1, "nombre" => "pepe", "salario" => 2000),
 1 => array("codigo" => 2, "nombre" => "Maria", "salario" => 3000),
 2 => array("codigo" => 3, "nombre" => "Jose", "salario" => 1000)
);

foreach ($matriz2 as $indF => $fila) {
echo $indF."<br>";
foreach($fila as $indC => $value) {
echo $indC."=".$value."<br>";
}
}


$matriz2 = array(
0 => array("codigo" => 1, "nombre" => "pepe", "salario" => 2000),
 1 => array("codigo" => 2, "nombre" => "Maria", "salario" => 3000),
 2 => array("codigo" => 3, "nombre" => "Jose", "salario" => 1000)
);

$matriz3 = array(
 "Contabilidad" => array("Nombre" => "Pepe", "Apellido" => "Lopez", "Salario" => 2100, "Edad" => 35),
 "Marqueting" => array("Nombre" => "Juan", "Apellido" => "Rodriguez", "Salario" => 2220, "Edad" => 41),
 "Ventas" => array("Nombre" => "Maria", "Apellido" => "Sanchez", "Salario" => 2315, "Edad" => 38),
 "Administracion" => array("Nombre" => "Susana", "Apellido" => "Ramirez", "Salario" => 1850, "Edad" => 53),
 "Direccion" => array("Nombre" => "Rosa", "Apellido" => "Capri Sun", "Salario" => 3550, "Edad" => 58),
);

foreach ($matriz3 as $indF => $fila) {
echo "<tr><td>".$indF."</td>";
    
    foreach ($fila as $indC => $value) {
        echo "<td>".$value;
    }
    echo "</tr>";
}
?>

