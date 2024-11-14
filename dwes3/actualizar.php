<?php

if (isset($_GET["status"])) {
    if ($_GET["status"] == "success") {
        echo "<br>Registro insertado correctamente<br>";
        echo "<a href='listado.php'><input type='button' value='Continuar'></input></a>";
    }
}
?>