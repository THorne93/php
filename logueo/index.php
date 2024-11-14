<?php
session_start();
$_SESSION["intentos"]=3;
?>
<?php
if (isset($_POST["login"])) {
    try {
        $conex = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.');
        
        
        $result = $conex->query("select * from perfil_usuario where user='$_POST[usu]'");
        $pwd = $result->fetchObject();
        if (password_verify($_POST['clave'], $pwd->pass)) {
            $_SESSION["usuario"] = $pwd;
            $_SESSION["login"] = "1";
            header("location: inicio.php");
        } else {
            echo password_hash($_POST["clave"], PASSWORD_DEFAULT);
        }
    } catch (PDOException$ex) {
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
