<?php
// ob_start(); -> to create a buffer before html
echo "hola<br>";
date_default_timezone_set("Europe/Madrid");

setcookie("usuario", "Pepe", time() + 3600);
if(isset($_COOKIE['usuario'])) {
    echo $_COOKIE['usuario'];
}
// setcookie("usuario","Pepe",time()-1);
// echo date_default_timezone_get();
// ob_end_flush();
?>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <a href="2.php">Ir a cookie 2</a>
    </body>
</html>
