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
        <style>
            table,tr,th,td {
                border-collapse: collapse;
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <form action="" method="POST"><input type="submit" name="salir" value="Salir"></form>
        <table>
            <tr>
                <th>Nombre Tarea</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Horas actuales</th>
                <th>Modificacion</th>
            </tr>
            <?php
            if ($realizas = RealizaController::getAllByEmail($_SESSION["user"]->email)) {
                foreach ($realizas as $r) {
                    $t = tareaController::find($r->idTarea);

                    echo "<tr>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='idTarea' value='$r->idTarea'>";
                    echo "<td>$t->nombre</td>";
                    echo "<td>$t->fechaIni</td>";
                    echo "<td>$t->fechaFin</td>";
                    echo "<td><input type='text' name='horas' value='$r->horas'></td>";
                    echo "<td><input type='submit' name='modificar' value='modificar'></td>";
                    echo "</form>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<h1>Todavia no tienes tareas</h1>";
            }
            ?>

            <a href="session.php"><input type="button" value="Volver"></a>   
    </body>
</html>
<?php
if (isset($_POST["modificar"])) {
    if (RealizaController::update($_SESSION["user"]->email, $_POST["idTarea"], $_POST["horas"])) {
        header("location: actualizatarea.php");
    } else
        echo "Error en actualizar";
}
?>
