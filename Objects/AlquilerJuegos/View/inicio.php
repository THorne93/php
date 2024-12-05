<?php
require_once '../Controllers/juegosController.php';
require_once '../Controllers/clienteController.php';
session_start();
?>
<html>

    <head>
        <title>title</title>
        <style>
<?php require_once '../View/style.php'; ?>

        </style>
    </head>
    <body>
        <?php require_once './menu.php'; ?>
        <br><br><h1 style="text-align: center">JUEGOS</h1><br><br>
        <?php
        if (isset($_POST["todos"])) {
            if ($j = JuegosController::getAll()) {
                echo "<div class='parent'>";
                foreach ($j as $juego) {
                    echo "<form action='juego.php' method='post'>";
                    echo "<input type='hidden' name='juegoID' value='$juego->codigo'>";
                    echo "<input type='image' src='$juego->imagen'  height=200 width=200  alt='submit' name='gotoJuego'>";
                    echo "</form>";
                }
                echo "</div>";
            }
        } else if (isset($_POST["noAq"])) {
            if ($j = JuegosController::getAllNoAq()) {
                echo "<div class='parent'>";
                foreach ($j as $juego) {
                    echo "<form action='juego.php' method='post'>";
                    echo "<input type='hidden' name='juegoID' value='$juego->codigo'>";
                    echo "<input type='image' src='$juego->imagen'  height=200 width=200  alt='submit' name='gotoJuego'>";
                    echo "</form>";
                }
                echo "</div>";
            }
        } else {
            if ($j = JuegosController::getAll()) {
                echo "<div class='parent'>";
                foreach ($j as $juego) {
                    echo "<form action='juego.php' method='post'>";
                    echo "<input type='hidden' name='juegoID' value='$juego->codigo'>";
                    echo "<input type='image' src='$juego->imagen'  height=200 width=200  alt='submit' name='gotoJuego'>";
                    echo "</form>";
                }
                echo "</div>";
            }
        }
        ?>
    </body>
</html>
