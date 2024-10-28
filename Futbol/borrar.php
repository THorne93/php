<html>
    <head>
        <title>Borrar</title>
    </head>
    <body>
        <h1>Borrar Jugador</h1>
        <form action="" method="POST" >

            Buscar DNI:<input type="text" name="dni"><br>
            <a href="index.php"><input type="button" value="Inicio"></input></a>
            <input type="submit" name="buscar" value="Buscar">
        </form>
        

        <?php
        require_once 'funciones.php';
        if (isset($_POST["buscar"])) {

            try {
                $conex= getConnection("dwes");
                $result = $conex->query("SELECT * from jugadores where dni='$_POST[dni]'");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            if ($result->num_rows) {
                while ($fila = $result->fetch_object()) {
                    showPlayers($fila);
                    echo "<form action='' method='POST'><input type='submit' name='borrar' "
                    . "value='Borrar'><br><input type='hidden' name='dni2' value='$_POST[dni]'><br><input type='submit' name='cancel' value='Cancelar'><br></form>";
                }
            } else {
                echo"<br>No hay registros en la BBDD";
            }
            $conex->close();
        }
        if (isset($_POST["borrar"])) {
            try {
                $conex = getConnection("dwes");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            if ($conex->query("DELETE FROM jugadores where dni='$_POST[dni2]'")) {
                $conex->close();
                header("Location: index.php?status=borrar");
                exit;
            }
        }
        ?>
    </body>
</html>
