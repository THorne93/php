<html>
    <head>
        <title>Mostrar</title>
    </head>
    <body>

        <h1>Lista Jugadores</h1>

        <?php
        require_once 'funciones.php';
        try {
            $conex = getConnection("dwes");
            $result = $conex->query("SELECT * FROM jugadores");
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
        echo "<form action='index.php'method='POST'><input type='submit' name='volver' value='Volver'><br></form>";
        ?>
    </body>
</html>
