<html>
    <?php
    require_once '../Controllers/clienteController.php';
    session_start();
    try {
        if (isset($_POST["submit"])) {
            $c = ClienteController::find($_POST["usu"]);
            if (ClienteController::validate($c, $_POST["clave"])) {
                $_SESSION["usuario"] = $c;
                //  var_dump($c);
                header("location: inicio.php");
            } else Echo "El usuario o clave esta incorrecto";
        }
    } catch (Exception $ex) {
        Echo "el usuario o clave esta incorrecto";
    }
    ?>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="post">
            Usuario: <input type="text" name="usu"><br>
            Clave: <input type="password" name="clave"><br>
            <a href="registrar.php"><input type="button" value="Registrar"></a>   <input type="submit" name="submit" value="Entrar"><a href="inicio.php"><input type="button" value="Ver Juegos"></a> 
        </form>
    </body>
</html>

