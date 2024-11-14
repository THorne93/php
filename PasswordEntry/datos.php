<?php
if (!isset($_COOKIE['allowLogin'])) {
    header("location: loginPH.php");
} else {
    setcookie("allowLogin", 1, time() - 3600 * 24 * 365);
}
?>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        if ($_COOKIE['primeraVez'] == 0) {
            echo "Bienvenido " . $_COOKIE["nombre"] . " " . $_COOKIE["apell"] . ". Ultima login: " . $_COOKIE['accesso'];
        } else {
            echo "Bienvenido por la primera vez";
            setcookie("primeraVez", 0);
        }
        setcookie("accesso", date("d-m-y H:i:s"), time() + 3600 * 24 * 365);
        ?>
        <br><img src="image (2).jpg"  alt="alt"/><br>

        <br><br><a href="loginPH.php"><input type="button" value="Salir"></input></a>
    </body>
</html>
