<?php
require_once '../Controllers/juegosController.php';
require_once '../Controllers/clienteController.php';
require_once './style.php';
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
}
if (isset($_POST["add"])) {
    if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
        $fich = time() . "-" . $_FILES["imagen"]["name"];
        $ruta = "imagenes/" . $fich;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "imagenes/" . $fich);
        $j = new Juego($_POST["codigo"], $_POST["nombre"], $_POST["consola"], $_POST["anno"], $_POST["precio"], "no", $ruta, $_POST["desc"]);
        if (JuegosController::insertar($j)) {
            header("location: inicio.php");
        } else
            echo "Error al insertar Juego";
    }
}
?>
<html>
    <head>
        <title>title</title>
    </head>
    <body>

        <span>
            <?php
            if (isset($_SESSION["usuario"])) {
                echo "<h1>Hola " . $_SESSION["usuario"]->nombre . " </h1>";
            } else {
                echo "<div class='button-group'>";
                echo "<a href='login.php'><input type='button' value='Login'></a>";
                echo "<a href='registrar.php'><input type='button' value='Registro'></a>";
                echo"</div>";
            }
            ?>
        </span>    <br>
        <br><a href="inicio.php"><input type="button" value="Volver"></a>
        <a href='salir.php'><input type='button' value='Salir'></a>

        <h1 style="text-decoration: underline">Nuevo Juego</h1><br>
        <form action="" method="post" enctype="multipart/form-data">
            Codigo: <input type="text" name="codigo"><br>
            Nombre: <input type="text" name="nombre"><br>
            Año: <input type="text" name="anno"><br>
            Consola: <input type="text" name="consola"><br>
            Precio: <input type="text" name="precio"><br>
            Imagen: <input type="file" name="imagen"><br>
            Descripción: <input type="text" name="desc"><br>
            <input type="submit" name="add" value="Añadir">
        </form>
    </body>
</html>


