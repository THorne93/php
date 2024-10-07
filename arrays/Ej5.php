<?php

$productos = array(
    1 => array("nombre" => "Don Limpio", "precio" => 420, "cantidad" => 69),
    2 => array("nombre" => "Fairy", "precio" => 5, "cantidad" => 120),
    3 => array("nombre" => "Nutella", "precio" => 12, "cantidad" => 588)
);

echo $productos[2]["nombre"]." - ".$productos[2]["precio"];
echo "<br>";
foreach ($productos as $indF => $fila) {
echo $indF."<br>";
foreach ($fila as $indC => $value) {
echo "<br>".$indC." - ".$value;
}
}
?>