<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();
if (isset($_SESSION["intentos"])) {
    if ($_SESSION["intentos"] <= 1) {
        setcookie("noEntry","1");
        header("location: intentos.php");
    }
}
if (isset($_SESSION["login"])) {
    header("location: inicio.php");
}
if (isset($_COOKIE["noEntry"])) {
            header("location: intentos.php");
}
?>
<?php
if (isset($_POST["login"])) {
    try {
        $conex = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.');

        $result = $conex->query("select * from perfil_usuario where user='$_POST[usu]'");
        $pwd = $result->fetchObject();
        if ($result->rowCount() == 1) {

            if (password_verify($_POST['clave'], $pwd->pass)) {
                $_SESSION["usuario"] = $pwd;
                $_SESSION["login"] = "1";
                $_SESSION["intentos"] = 2;

                header("location: inicio.php");
            } else {
                if (!isset($_SESSION["intentos"])) {
                    $_SESSION["intentos"] = 2;
                } else {
                    $_SESSION["intentos"] = $_SESSION["intentos"] - 1;
                }
                echo "Te quedan " . $_SESSION["intentos"] . " intentos";
            }
        } else {
            echo "El usuario o clave está incorrecto<br>";
            if (!isset($_SESSION["intentos"])) {
                $_SESSION["intentos"] = 2;
            } else {
                $_SESSION["intentos"] = $_SESSION["intentos"] - 1;
            }
            echo "Te quedan " . $_SESSION["intentos"] . " intentos";
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
?>

<html>
    <head>
        <?php require_once './style.php'; ?>
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
            Usuario:<input type="text" name="usu"><br>
            Clave:<input type="password" name="clave"><br>
            <a href="registrar.php"><input type="button" value="Registro"></a><input type="submit" name="login" value="Entrar">
        </form>
    </body>
</html>