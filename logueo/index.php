<?php
if (isset($_SESSION)) {
    header("location='inicio.php");
}
?>
<html>
    <head>
        <?php include_once 'style.php';?>
        <title>title</title>
    </head>
    <body>
        <form action="" method="POST">
            usuario: <input type="text" name="usu"><br>
            clave: <input type="password" name="pass"><br>
            <a href="registro.php"><input type="button" value="Registrar"></input></a><input type="submit" name="login" value="Entrar">
        </form>
    </body>
</html>
