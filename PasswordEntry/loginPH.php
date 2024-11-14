<?php
if (isset($_COOKIE['successful'])) {
    if ($_COOKIE["successful"] == "1") {
        echo "<br>Usuario registrado correctamente<br>";
        setcookie("successful", 1, time() - 3600 * 24 * 365);
    }
}
?>

<html>
    <head>
        <title>title</title>
    </head>

    <body>
        <form action="" method="POST">
            Usuario: <input type="text" name="usuario" value="<?php
            if (isset($_COOKIE["remember"])) {
                echo $_COOKIE["usuario"];
            } else
                echo "";
            ?>"><br>
            Clave: <input type="password" name="clave" value="<?php
            if (isset($_COOKIE["remember"])) {
                echo $_COOKIE["pwd"];
            } else
                echo "";
            ?>"><br>
            Recuerdame<input type="checkbox" name="remember" <?php
            if (isset($_COOKIE["remember"])) {
                echo "checked";
            }
            ?>><br>
            <input type="submit" name="enviar" value="Acceder"><a href="register.php"><input type="button" value="Registrar"></input></a>
        </form>
    </body>
    <?php
    if (isset($_POST["enviar"])) {

        try {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);
            $conex = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.', $opciones);
            $conex->beginTransaction();
            $result = $conex->prepare("select * from usuarios where usuario=?");
            $result->bindParam(1, $_POST["usuario"]);
            $result->execute();
            if ($result->rowCount() == 1) {
                $pwd = $result->fetchObject();

                if (password_verify($_POST["clave"], $pwd->clave)) {
                    if (isset($_POST["remember"])) {
                        setcookie("remember", 1, time() + 3600 * 24 * 365);
                        setcookie("usuario", $_POST["usuario"], time() + 3600 * 24 * 365);
                        setcookie("pwd", $_POST["clave"], time() + 3600 * 24 * 365);
                    } else {
                        setcookie("remember", 1, time() - 3600 * 24 * 365);
                        setcookie("usuario", $_POST["usuario"], time() - 3600 * 24 * 365);
                        setcookie("pwd", $_POST["clave"], time() - 3600 * 24 * 365);
                    }
                    if (!isset($_COOKIE['primeraVez'])) {
                        setcookie("primeraVez", 1);
                    }
                    setcookie("nombre", $pwd->nombre, time() + 3600 * 24 * 365);
                    setcookie("apell", $pwd->apellidos, time() + 3600 * 24 * 365);
                    setcookie("allowLogin", 1, time() + 3600 * 24 * 365);

                    header('Location: datos.php?');
                } else {
                    echo "clave o usuario incorrecto ";
                }
            } else {
                echo "clave o usuario incorrecto ";
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    ?>



</html>
