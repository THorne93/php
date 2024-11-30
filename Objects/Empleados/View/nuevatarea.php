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

        <h1>Nueva Tarea</h1>
        <form action="" method="post">
            Nombre:<input type="text" name="nombre"><br>
            Fecha Inicio:<input type="date" name="fechaIni"><br>
            Fecha Fin:<input type="date" name="fechaFin"><br>
            Participantes:<br> <select multiple="" name="participantes[]">
                <?php
                $participantes = EmpleadoController::getAllByDep($_SESSION["user"]->dep);
                foreach ($participantes as $e) {
                    if ($e->email != $_SESSION["user"]->email) {
                        echo "<option value='$e->email'>$e->nombre</option>";
                    }
                }
                ?>
            </select><br>
            <input type="submit" name="newTarea" value="Insertar">
        </form>
        <a href="session.php"><input type="button" value="Volver"></a>   
    </body>
</html>

<?php
if (isset($_POST["newTarea"])) {
    $t = new Tarea($i = '', $_POST["nombre"], $_POST["fechaIni"], $_POST["fechaFin"]);
    if (tareaController::insertar($t)) {
        $tareaId = tareaController::getLast();
        $r = new Realiza($_SESSION["user"]->email, $tareaId->id, 0);
        RealizaController::insertar($r);
        foreach ($_POST["participantes"] as $e) {
            $r = new Realiza($e, $tareaId->id, 0);
            RealizaController::insertar($r);
        }
        echo "tarea insertado correctamente";
    }
}
?>
