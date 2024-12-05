<?php
require_once '../Controllers/juegosController.php';
require_once '../Controllers/clienteController.php';
require_once '../Controllers/alquilerController.php';
require_once './style.php';
session_start();

if (isset($_POST["modificar"])) {
    if (JuegosController::modify($_POST["juego"], $_POST["nombre"], $_POST["anno"], $_POST["consola"], $_POST["precio"])) {
        echo "modificado correctamente";
    } else
        echo "error en modificar";
}
if ($_POST["juegoID"] != null) {
    $_SESSION["juego"] = $_POST["juegoID"];
}

$j = JuegosController::find($_SESSION["juego"]);
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <?php
        if (isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]->tipo == "cliente" || $_SESSION["usuario"]->tipo == "admin") {
                echo "<span>";
                echo "<div class = 'button-group'>";
                echo"<form action ='' method = 'post'>";
                echo"<a href = 'misalquilados.php'><input type = 'button' value = 'Mis Aquilados'></a>";
                echo"<a href = 'salir.php'><input type = 'button' value = 'Salir'></a>";
                echo"</form></div>";
                echo"</span> <br>";
            } if ($_SESSION["usuario"]->tipo == "admin") {
                echo "<span>";
                echo"<div class = 'button-group'>";
                echo"<form action = '' method = 'post'></form>";
                echo"<a href = 'nuevojuego.php'><input type = 'button' value = 'Nuevo Juego'></a>";
                echo"   </div>";
                echo"</span>";
            }
        }
        ?>
        <br><a href="inicio.php"><input type="button" value="Volver"></a>
        <div class="container">
            <div>
                <img height="200" style="border: none" width="200" src="<?php echo $j->imagen ?>" alt="alt"/>
            </div>
            <div>
                <h3 style="text-decoration: underline">Datos</h3>
                <?php
                echo "<form method='post'>";
                if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->tipo == "admin") {
                    echo "Nombre: <input type='text' name='nombre' value='$j->nombreJuego'><br>";
                    echo "Año: <input type='text' name='anno' value='$j->anno'><br>";
                    echo "Consola: <input type='text' name='consola' value='$j->nombreConsola'><br>";
                    echo "Precio: <input type='text' name='precio' value='$j->precio'><br>";
                } else {
                    echo "Nombre: $j->nombreJuego<br>";
                    echo "Año: $j->anno<br>";
                    echo "Consola: $j->nombreConsola<br>";
                    echo "Precio: $j->precio<br>";
                }
                ?>

            </div>
        </div><br>
        <?php
        $a = AlquilerController::find($j->codigo);
        if ($j->alquilado == "si" || $j->alquilado == "Si") {
            if (isset($_SESSION["usuario"])) {
                if ($_SESSION["usuario"]->tipo == "admin") {
                    $usu = ClienteController::find($a->dniCliente);
                    echo "Juego ya alquilado por $usu->nombre $usu->apellidos ($usu->dni): Fecha devolución prevista: " . $a->fechaDevol;
                } else {
                    echo "Juego ya alquilado: Fecha devolución prevista: " . $a->fechaDevol;
                }
            } else {
                echo "Juego ya alquilado: Fecha devolución prevista: " . $a->fechaDevol;
            }
        } else {
            if (isset($_SESSION["usuario"])) {
                if ($_SESSION["usuario"]->tipo == "cliente") {

                    echo "<input type='submit' name='alquilar' value='Aquiler'>"
                    . "<input type='hidden' name='juego' value='$j->codigo'>"
                    . "</form>";
                }
            }
        }
        if (isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]->tipo == "admin") {
                echo "<form action='' method='post'>"
                . "<input type='hidden' name='juego' value='$j->codigo'>"
                . "<input type='hidden' name='juegoLoc' value='$j->imagen'>"
                . "<input type='submit' name='eliminar' value='Eliminar'>"
                . "<input type='submit' name='modificar' value='Modificar'>"
                . "</form>";
            }
        }
        echo "</form>";

        if (isset($_POST["eliminar"])) {
            if (JuegosController::borrar($_POST["juego"])) {
                unlink("$j->imagen");
                header("location: inicio.php");
            } else
                echo "error al borrar el juego";
        }

        if (isset($_POST["alquilar"])) {
            if (JuegosController::alquiler($_POST["juego"]) && AlquilerController::insertar($_POST["juego"], $_SESSION["usuario"]->dni)) {
                header("location: inicio.php");
            } else
                echo "error al alquiler";
        }
        ?>
    </body>
</html>
