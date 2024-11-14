<?php
if (isset($_POST["login"])) {
    try {
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);
        $conex = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.', $opciones);
        $pass = md5($_POST["pass"]);
        echo $pass;
        $result = $conex->query("SELECT * from usuarios where usuario='$_POST[usu]' && clave='$pass'");
        if ($result->rowCount()) {
            echo "correcto";
            $reg=$result->fetchObject();
            session_start();
            $_SESSION["usuario"]=$reg;
            header("location: index.php ");
        } else {
            echo "incorrecto";
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
}
?>

<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="POST">
            usuario: <input type="text" name="usu"><br>
            contraseña: <input type="password" name="pass"><br>
            <input type="submit" name="login" value="Login">
        </form>
    </body>
</html>
