<html>
    <head>
        <title>Modificar</title>
    </head>
    <body>
        <h1>Modificar Jugador</h1>
        <form action="" method="POST" >
            Buscar DNI:<input type="text" name="dni">
            <input type="submit" name="buscar" value="Buscar">
        </form>
        <a href="index.php"><input type="button" value="Inicio"></input></a>

        <?php
        require_once 'funciones.php';

        $check = false;
        if (isset($_POST["insertar"])) {
            if (!empty($_POST["nombre"]) && !empty($_POST["dni"]) && !empty($_POST["equipo"]) && !empty($_POST["goles"]) && isset($_POST["posicion"])) {
                $check = true;
            } else
                echo "HAY ERRORES EN EL FORMULARIO";
        }
        if (isset($_POST["insertar"]) && $check) {
            try {
                $conex = getConnection("dwes");
                $position = 0;
                foreach ($_POST["posicion"] as $value) {
                    $position += $value;
                }

                $conex->query("UPDATE jugadores set nombre='$_POST[nombre]',dorsal=$_POST[dorsal],posicion=$position,"
                        . "equipo='$_POST[equipo]',numGoles=$_POST[goles] WHERE dni='$_POST[dni]'");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            $conex->close();
            header("Location: index.php?status=modificar");
            exit;
        }
        if (isset($_POST["buscar"])) {

            try {
                $conex = getConnection("dwes");
                $result = $conex->query("SELECT * from jugadores where dni='$_POST[dni]'");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            if ($result->num_rows) {
                while ($fila = $result->fetch_object()) {
                    ?>
                    <form action="" method="POST">
                        DNI:<input type="text" disabled name="dni" value="<?php echo $fila->dni ?>"><br>
                        Nombre:<input type="text" name="nombre" value="<?php echo $fila->nombre ?>"><br>
                        Dorsal:<select  name="dorsal">
                            <?php
                            $i = 1;
                            while ($i < 12) {
                                if ($i == $fila->dorsal) {
                                    echo "<option selected value=$i>$i</option>";
                                } else {
                                    echo "<option value=$i>$i</option>";
                                }
                                $i += 1;
                            }
                            ?>
                        </select><br>
                        Posición:<select multiple="" name="posicion[]">
                            <?php
                            $fields = explode(",", $fila->posicion);
                            ?>
                            <option value="1" <?php
                            foreach ($fields as $value) {
                                if ($value == "portero") {
                                    echo "selected";
                                }
                            }
                            ?>>Portero</option>
                            <option value="2" <?php
                            foreach ($fields as $value) {
                                if ($value == "defensa") {
                                    echo "selected";
                                }
                            }
                            ?>>Defensa</option>
                            <option value="4" <?php
                            foreach ($fields as $value) {
                                if ($value == "centrocampista") {
                                    echo "selected";
                                }
                            }
                            ?>>CentroCampista</option>
                            <option value="8" <?php
                            foreach ($fields as $value) {
                                if ($value == "delantero") {
                                    echo "selected";
                                }
                            }
                            ?>>Delantero</option>

                        </select><br>
                        Equipo:<input type="text" name="equipo" value="<?php echo $fila->equipo ?>"><br>
                        Nº Goles:<input type="text" name="goles" value="<?php echo $fila->numGoles ?>"><br>
                        <a href="index.php"><input type="button" value="Inicio"></input></a>
                        <input type="submit" name="insertar" value="Modificar">
                    </form>
                    <?php
                }
            } else {
                echo"<br>No hay registros en la BBDD";
            }
            $conex->close();
        }
        ?>
    </body>
</html>
