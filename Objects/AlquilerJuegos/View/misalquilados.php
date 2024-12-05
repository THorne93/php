<?php
require_once '../Controllers/juegosController.php';
require_once '../Controllers/clienteController.php';
require_once '../Controllers/alquilerController.php';
session_start();
?>
<html>
    <head>
        <title>title</title>
        <?php require_once '../View/style.php'; ?>
    </head>
    <body>
        <span>
            <h1>Hola <?php echo $_SESSION["usuario"]->nombre ?></h1>
            <div class="button-group">
                <a href="login.php"><input type="button" value="Login"></a>
                <a href="registrar.php"><input type="button" value="Registro"></a>
                <a href="inicio.php"><input type="button" value="Volver"></a>
            </div>
        </span>    <br>
        <br><br><h1 style="text-align: center">Mis Alquilados</h1><br><br>  
        <?php
        if ($a = AlquilerController::getAllByDni($_SESSION["usuario"]->dni)) {
            echo "<table><tr><th></th><th></th><th></th></tr>";
            foreach ($a as $alquiler) {
                $j = JuegosController::find($alquiler->idJuego);
                if ($j->alquilado == "Si") {
                    echo "<tr>";
                    echo "<form method='post'>";
                    echo "<td><img src='$j->imagen' height='200' width='200'></td>";
                    echo "<td>Fecha Alquiler: $alquiler->fechaAlquiler <br> Fecha Devolucion: $alquiler->fechaDevol <br> Precio: $j->precio €</td>";
                    echo "<td><input type='submit' name='devolver' value='Devolver'></td>";
                    echo "<td><input type='hidden' name='juegoId' value='$j->codigo'></td>";
                    echo "</form>";
                }
            }
        }
        if (isset($_POST["devolver"])) {
            if (JuegosController::devolver($_POST["juegoId"]) && AlquilerController::devolver($_POST["juegoId"], $_SESSION["usuario"]->dni)) {
                header("location: misalquilados.php");
            }
        }
        ?>


    </body>
</html>
