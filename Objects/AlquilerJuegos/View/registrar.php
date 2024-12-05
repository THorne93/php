<?php
require_once '../Controllers/juegosController.php';
require_once '../Controllers/clienteController.php';
require_once '../Controllers/alquilerController.php';
require_once './style.php';
session_start();
?>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="post">
            DNI: <input type="text" name="dni"><br>
            Nombre: <input type="text" name="nombre"><br>
            Apellidos: <input type="text" name="apell"><br>
            Dirección: <input type="text" name="dir"><br>
            Localidad: <input type="text" name="loc"><br>
            Clave: <input type="password" name="clave"><br>
            <a href="login.php"><input type="button" value="Volver"></a>   <input type="submit" name="submit" value="Registrar">
        </form>
        <?php
        if (isset($_POST["submit"])) {
            $c = new Cliente($_POST["dni"], $_POST["nombre"], $_POST["apell"], $_POST["dir"], $_POST["loc"], $_POST["clave"]);
            if (ClienteController::insertar($c)) {
                echo "usuario insertado correctamente";
            }
        }
        ?>
    </body>
</html>
