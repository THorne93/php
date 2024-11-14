<?php

date_default_timezone_set("Europe/Madrid");
$date = date('m/d/Y h:i:s a', time());
setcookie("accesso",date("d-m-y H:i:s"));
if(isset($_COOKIE['accesso'])) {
    echo "Bienvenido. Ultima login: ".$_COOKIE['accesso'];
} else echo "Bienvenido por la primera vez";

?>