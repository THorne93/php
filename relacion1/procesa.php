<?php
// echo $_POST['nombre']." ".$_POST['apell'];

echo $_SERVER["PHP_SELF"];
echo $_REQUEST["nombre"]." ".$_REQUEST["apell"]."<br>";
echo "modulos: <br>";
foreach ($_POST["modulos"] as $value) {
    echo $value."<br>";
}

?>