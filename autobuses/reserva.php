<html>
    <head>
        <title>Reserva</title>
    </head>
    <body>
        <?php
        include './style.php';
        session_start();
        $correctChanges = false;
        try {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);
            $conex = new PDO('mysql:host=localhost;dbname=autobuses;charset=utf8mb4', 'dwes', 'abc123.', $opciones);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        ?>
        <div class="header">
            <h1>Reserva viaje</h1>
            <a href="index.html">Menú</a>
        </div>

        <form action="" method="POST">
            Fecha: <input type="date" name="fecha" value='<?php
            if (isset($_POST["enviar"])) {
                echo $_POST["fecha"];
            }
            if (isset($_POST["enviar2"])) {
                echo $_SESSION["resFecha"];
            }
            ?>'><br>
            Origen: <select name = "origen">
                <?php
                $result = $conex->query("select * from viajes group by origen");
                if ($result->rowCount()) {
                    while ($fila = $result->fetchObject()) {

                        echo "<option value='$fila->origen'";
                        if (isset($_POST['enviar']) && $_POST['origen'] == $fila->origen) {
                            echo 'selected';
                        } else if (isset($_POST["enviar2"]) && $_SESSION["resOrigen"] == $fila->origen) {
                            echo 'selected';
                        }
                        echo ">$fila->origen</option><br>";
                    }
                }
                ?>
            </select><br>
            Destino: <select name="destino">
                <?php
                $result = $conex->query("select * from viajes group by destino");
                if ($result->rowCount()) {
                    while ($fila = $result->fetchObject()) {

                        echo "<option value='$fila->destino'";
                        if (isset($_POST['enviar']) && $_POST['destino'] == $fila->destino) {
                            echo 'selected';
                        } else if (isset($_POST["enviar2"]) && $_SESSION["resDestino"] == $fila->destino) {
                            echo 'selected';
                        }
                        echo ">$fila->destino</option><br>";
                    }
                }
                ?>
            </select><br>
            <input type="submit" name="enviar" value="Consultar">
        </form>
        <?php
        if (isset($_POST["enviar2"])) {
            if ($_POST["plazas"] >= 0 && $_POST["plazas"] < $_POST["plazasLibres"]) {
                $correctChanges = true;
                try {
                    $conex->beginTransaction();
                    $calc = $_POST["plazasLibres"] - $_POST["plazas"];
                    $result = $conex->prepare("update viajes set plazas_libres=? WHERE fecha = ? AND origen = ? AND destino = ?");
                    $result->bindParam(1, $calc);
                    $result->bindParam(2, $_SESSION["resFecha"]);
                    $result->bindParam(3, $_SESSION["resOrigen"]);
                    $result->bindParam(4, $_SESSION["resDestino"]);
                    $result->execute();
                    if ($result->rowCount()) {
                        $conex->commit();
                        echo "Ha reservado " . $_POST["plazas"] . " plazas para ir desde " . $_SESSION["resOrigen"] . " hasta " . $_SESSION["resDestino"] . " la fecha " . $_SESSION["resFecha"];
                    }
                } catch (PDOException $ex) {
                    echo $ex->getMessage();
                }
            } else {
                $correctChanges = false;
            }
        }
        if (isset($_POST["enviar"]) || (isset($_POST["enviar2"]) && !$correctChanges)) {
            if (isset($_POST["enviar"])) {
                $_SESSION["resFecha"] = $_POST["fecha"];
                $_SESSION["resOrigen"] = $_POST["origen"];
                $_SESSION["resDestino"] = $_POST["destino"];
            }
            if ($_SESSION["resOrigen"] == $_SESSION["resDestino"]) {
                echo "<p>Origen y Destino no puede ser el mismo</p>";
            } else {
                $conex->beginTransaction();
                $result = $conex->prepare("select * from viajes where fecha = ? AND origen = ? AND destino = ?");
                $result->bindParam(1, $_SESSION["resFecha"]);
                $result->bindParam(2, $_SESSION["resOrigen"]);
                $result->bindParam(3, $_SESSION["resDestino"]);
                $result->execute();
                $correctChanges = true;
                if ($result->rowCount()) {
                    $fila = $result->fetchObject();
                    ?>
                    <form action="" method="POST">
                        Fecha: <?php
                        echo $fila->fecha;
                        ?><br>
                        Origen: <?php
                        echo $fila->origen;
                        ?><br>
                        Destino: <?php
                        echo $fila->destino;
                        ?><br>
                        Plazas Disponibles: <?php
                        echo $fila->plazas_libres;
                        ?><br><input type="hidden" name="plazasLibres" value="<?php echo $fila->plazas_libres ?>">
                        Nº plazas a reservar:<input type="text" name="plazas"><?php
                        if (isset($_POST["enviar2"]) && ($_POST["plazas"] > $_POST["plazasLibres"])) {
                            echo "<p>Nº de plazas mayor que las disponibles</p>";
                        }
                        ?><br> 
                        <input type="submit" name="enviar2" value="Reservar">
                    </form>


                    <?php
                } else
                    echo "<p>No hay ningún viaje desde " . $_SESSION["resOrigen"] . " hasta " . $_SESSION["resDestino"] . " el " . $_SESSION["resFecha"];
            }
        }
        ?>
    </body>
</html>
