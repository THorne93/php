<?php
include_once './funciones.php';
$validForm = false;
$validUser = true;
$msg = null;
$conex = getConnection("dwes");

if (isset($_POST["enviar"])) {
    try {
        $result = $conex->prepare("select * from usuarios where usuario=?");
        $result->bindParam(1, $_POST["usu"]);
        $result->execute();
        if ($result->rowCount() == 1) {
            $validUser = false;
        } else {
            $validUser = true;
        }
    } catch (Exception $ex) {
        
    }
    if (checkDNI($_POST["dni"]) && checkNombre($_POST["nombre"]) && checkNombre($_POST["apell"]) && $validUser && ($_POST["clave"]) == $_POST["confClave"]) {
        $validForm = true;
    } else {
        $msg = "Hay errores en el formulario";
        $validForm = false;
    }
}

if (isset($_POST["enviar"]) && $validForm) {
    try {
        $conex->beginTransaction();
        $clave_encrip = password_hash($_POST["clave"], PASSWORD_DEFAULT);
        $result = $conex->prepare("insert into usuarios (DNI, Nombre, Apellidos, usuario, clave) values (?, ?, ?, ?, ?) ");
        $result->bindParam(1, $_POST["dni"]);
        $result->bindParam(2, $_POST["nombre"]);
        $result->bindParam(3, $_POST["apell"]);
        $result->bindParam(4, $_POST["usu"]);
        $result->bindParam(5, $clave_encrip);
        $result->execute();
        if ($result->rowCount() == 1) {
            $conex->commit();
            setcookie("successful", 1, time() + 3600 * 24 * 365);
            header("location: loginPH.php");
        }
    } catch (Exception $ex) {
        $conex->rollback();
        echo $ex->getMessage();
    }
}
?>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="POST">
            DNI: <input type="text" name="dni"><br>
            Nombre: <input type="text" name="nombre"><br>
            Apellidos: <input type="text" name="apell"><br>
            Usuario: <input type="text" name="usu"><br>
            Clave: <input type="password" name="clave"><br>
            Confirma Clave: <input type="password" name="confClave"><br>
            <a href="loginPH.php"><input type="button" value="Login"></input></a><input type="submit" name="enviar" value="Registrar">
        </form>
    </body>
</html>
<?php
if ($msg != null) {
    echo $msg;
}
?>
