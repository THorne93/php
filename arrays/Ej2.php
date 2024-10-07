<?php

$persona =array("nombre"=>"Juan","edad"=>25,"ciudad"=>"Madrid");
echo $persona["nombre"]." - ".$persona["ciudad"];
echo "<br>";

// $persona[] = "profesion";
$persona["profesion"]="Ingeniero";

foreach ($persona as $key => $value) {
    echo $key." - ".$value;
    echo "<br>";
}

?>