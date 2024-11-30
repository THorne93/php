<?php
require_once '../Controllers/empleadoController.php';
require_once '../Controllers/realizaController.php';
require_once '../Controllers/tareaController.php';
?>
<html>
    <?php
    if (isset($_POST["login"])) {
        echo ($_POST["email"]);
        try {
            if ($user = EmpleadoController::find($_POST["email"])) {
                echo $user->pass . "<br>";
                echo md5($_POST["clave"]) . "<br>";
                if ($user->pass == md5($_POST["clave"])) {
                    session_start();
                    $_SESSION["user"] = $user;
                    header("location: session.php");
                } else {
                    echo "el contrasena no existe!";
                }
            }
           else echo "el usuario no existe!";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    ?>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="post">
            Email:<input type="text" name="email"><br>
            Clave:<input type="password" name="clave"><br>
            <input type="submit" name="login" value="Entrar">
        </form>
    </body>
</html>
