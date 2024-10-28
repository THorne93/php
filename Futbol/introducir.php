<html>
    <head>
        <title>Introducir</title>
    </head>
    <body>

        <?php
        require_once 'funciones.php';
        $check = false;
        if (isset($_POST["insertar"])) {
            if (!empty($_POST["nombre"]) && checkNombre($_POST["nombre"]) && checkDNI($_POST["dni"]) && !empty($_POST["equipo"]) && !empty($_POST["goles"]) && checkGoles($_POST["goles"]) && isset($_POST["posicion"])) {
                $check = true;
            } else
                echo "HAY ERRORES EN EL FORMULARIO";
        }
        if (isset($_POST["insertar"]) && $check) {
            try {
                $conex = getConnection("dwes");
                $result = $conex->query("SELECT * FROM jugadores WHERE DNI='$_POST[dni]'");
                if ($result->num_rows == 0) {
                    $position = 0;
                    foreach ($_POST["posicion"] as $value) {
                        $position += $value;
                    }

                    $conex->query("INSERT INTO jugadores VALUES('$_POST[dni]', '$_POST[nombre]', $_POST[dorsal], $position, "
                            . "'$_POST[equipo]', $_POST[goles])");

                    $conex->close();
                    header("Location: index.php?status=insert");
                    exit;
                } else echo "El DNI ya existe";
            } catch (Exception $ex) {

                die($ex->getMessage());
            }
        }
        ?>
        <h1>Insertar Jugador</h1>
        <form action="" method="POST">
            DNI:<input type="text" name="dni" value='<?php if (isset($_POST["insertar"])) echo $_POST["dni"] ?>'>
            <?php
            if (isset($_POST["insertar"])) {
                if (!checkDNI($_POST["dni"]))
                    echo "DNI no valido";
            }
            ?>
            <br>Nombre:<input type="text" name="nombre" value='<?php if (isset($_POST["insertar"])) echo $_POST["nombre"] ?>'>
            <?php
            if (isset($_POST["insertar"])) {
                if (!isEmpty($_POST["nombre"])) {
                    if (!checkNombre($_POST["nombre"])) {
                        echo "El nombre solo puede tener letras!";
                    }
                } else {
                    echo "El nombre no peude ser vacio!";
                }
            }
            ?>
            <br>Dorsal:<select  name="dorsal">
                <?php
                $i = 1;
                while ($i < 12) {
                    echo "<option value=$i>$i</option>";
                    $i += 1;
                }
                ?>
            </select><br>
            Posición:<select multiple="" name="posicion[]">
                <option value="1">Portero</option>
                <option value="2">Defensa</option>
                <option value="4">CentroCampista</option>
                <option value="8">Delantero</option>

            </select>
            <?php
                    if (isset($_POST["insertar"])){
                        if (!isset($_POST["posicion"])) {
                            echo "Tienes que elegir al menos una posicion!";
                        }
                    }
            ?>
            <br>
            Equipo:<input type="text" name="equipo" value='<?php if (isset($_POST["insertar"])) echo $_POST["equipo"] ?>'>
            <?php
            if (isset($_POST["insertar"])) {
                if (isEmpty($_POST["equipo"]))
                    echo "El equipo no puede estar vacio!";
            }
            ?>
            <br>Nº Goles:<input type="text" name="goles" value='<?php if (isset($_POST["insertar"])) echo $_POST["goles"] ?>'>
            <?php
            if (isset($_POST["insertar"])) {
                if (!isEmpty($_POST["goles"])) {
                    if (!checkGoles($_POST["goles"])) {
                        echo "Goles debe ser un numero!";
                    }
                } else {
                    echo "Goles no puede estar vacio!";
                }
            }
            ?>
            <br><a href="index.php"><input type="button" value="Inicio"></input></a>
            <input type="submit" name="insertar" value="Insertar">
        </form>

    </body>
</html>
