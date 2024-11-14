<html>
    <head>
        <?php include './style.php'; ?>
        <title>Autobus</title>
    </head>
    <body>
        <div class="header">
            <h1>Nuevo Autobús</h1>
            <a href="index.html">Menú</a>
        </div>
        <form action="" method="POST">
            Matrícula:<input type="text" name="matricula"><br>
            Marca:<input type="text" name="marca"><br>
            Nº Plazas:<input type="text" name="plazas" ><br>
            <input type="submit" name="enviar" value="Añadir">
        </form>
        <?php
        if (isset($_POST["enviar"])) {
            try {
                $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);
                $conex = new PDO('mysql:host=localhost;dbname=autobuses;charset=utf8mb4', 'dwes', 'abc123.', $opciones);
                $conex->beginTransaction();
                $result = $conex->prepare("insert into autos values (?,?,?)");
                $result->bindParam(1, $_POST["matricula"]);
                $result->bindParam(2, $_POST["marca"]);
                $result->bindParam(3, $_POST["plazas"]);
                $result->execute();
                if ($result->rowCount() == 1) {
                    $conex->commit(); //Confirmo los cambios.Los guarda.
                    echo "Autobús insertado correctamente";
                } else {
                    $conex->rollBack();
                    echo "error al realizar la actualizacion";
                }
            } catch (PDOException $ex) {
                $conex->rollBack();
                if ($ex->errorInfo[1] == 1062) {
                    echo "La matricula ya existe";
                } else {
                    echo $ex->getMessage();
                }
            }
        }
        ?>
    </body>
</html>
