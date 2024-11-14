<html>
    <head>
        <title>Buscar</title>
    </head>
    <body>
        <h1>Buscar Jugador</h1>
        <form action="" method="POST" >
            Buscar por:<select name="searchOption">
                <option value="equipo">Equipo</option>
                <option value="posicion">Posicion</option>
                <option value="dni">DNI</option>
            </select><br>
            Valor a buscar:<input type="text" name="searchValue"><br>
            <input type="submit" name="buscar" value="Buscar">
        </form>
        <a href="index.php"><input type="button" value="Inicio"></input></a><br>

        <?php
        require_once 'funciones.php';
        if (isset($_POST["buscar"])) {

            try {
                $conex = getConnection("dwes");
                $option = $_POST["searchOption"];
                $val = $_POST["searchValue"];
                $val2="%$val%";
                $stmt = $conex->prepare("SELECT * from jugadores where $option LIKE ?");
                $stmt->bind_param("s", $val2);
                $stmt->execute();
                $result = $stmt->get_result();
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            if ($result->num_rows) {
                while ($fila = $result->fetch_object()) {
                    showPlayers($fila);
                }
            } else {
                echo"<br>No hay registros en la BBDD";
            }
            $conex->close();
            exit;
        }
        ?>
    </body>
</html>
