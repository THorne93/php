<?php
require_once '../Controllers/empleadoController.php';
require_once '../Controllers/realizaController.php';
require_once '../Controllers/tareaController.php';
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
if (isset($_POST["salir"])) {

    header("location:salir.php");
}
?>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="POST"><input type="submit" name="salir" value="Salir"></form>
        <?php
        echo "<h1>Bienvenido " . $_SESSION['user']->nombre . "</h1>";
        ?>

        <a href="nuevatarea.php">Nueva Tarea</a><br>
        <a href="actualizatarea.php">Actualiza Tarea</a><br>
    </body>
</html>
