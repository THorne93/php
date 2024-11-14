<html>
    <head>
        <?php
        include './style.php';
        session_start();
        try {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);
            $conex = new PDO('mysql:host=localhost;dbname=autobuses;charset=utf8mb4', 'dwes', 'abc123.', $opciones);
            $result = $conex->query("select * from autos");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        ?>
        <title>Viajes</title>
    </head>
    <body>
        <div class="header">
            <h1>Nuevo Viaje</h1>
            <a href="index.html">Menú</a>
        </div>
        <form action="" method="POST">
            Fecha:<input type="date" name="fecha"><br>
            Matrícula: <select name="matricula">
                <?php
                if ($result->rowCount()) {
                    while ($fila = $result->fetchObject()) {

                        echo "<option value='$fila->matricula'";
                        if (isset($_POST['enviar']) && $_POST['matricula'] == $fila->matricula) {
                            echo 'selected';
                        }
                        echo ">$fila->matricula</option><br>";
                    }
                }
                ?>
            </select><br>
            Origen:<input type="text" name="origen"><br>
            Destino:<input type="text" name="destino" ><br>
            <input type="submit" name="enviar" value="Añadir">
        </form>

        <?php
        if (isset($_POST["enviar"])) {
            if (isset($_POST["enviar"])) {
                $_SESSION["editDate"] = $_POST["editDate"];
                $_SESSION["editMatricula"] = $_POST["editMatricula"];
            }
            try {

                $conex->beginTransaction();
                $plaza = $conex->query("Select num_plazas from autos where matricula='$_POST[matricula]'");
                $filaPlaza = $plaza->fetchObject();

                $result = $conex->prepare("insert into viajes values (?,?,?,?,?)");
                $result->bindParam(1, $_POST["fecha"]);
                $result->bindParam(2, $_POST["matricula"]);
                $result->bindParam(3, $_POST["origen"]);
                $result->bindParam(4, $_POST["destino"]);
                $result->bindParam(5, $filaPlaza->num_plazas);
                $result->execute();
                if ($result->rowCount() == 1) {
                    $conex->commit();
                    echo "Viaje insertado correctamente";
                } else {
                    $conex->rollBack();
                    echo "error al realizar la actualizacion";
                }
            } catch (PDOException $ex) {
                $conex->rollBack();
                echo $ex->getMessage();
            }
        }
        ?>
    </body>
</html>
