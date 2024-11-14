<html>
    <head>
        <title>title</title>

    </head>
    <style>
        h1 {
            margin-bottom:0;
        }
        form {
            background-color:#ddf0a4;
        }
        div {
            background-color:#EEEEEE;
            height:600px;
        }
        .pie {
            background-color:#ddf0a4;
            color:#ff0000;
            height:30px;
        }
    </style>

    <body>
        <?php
        try {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);
            $conex = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.', $opciones);

            $result = $conex-> query("SELECT * FROM familia");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        ?>
        <h1>Listado de productos de una familia</h1>
        <form  action="" method="POST">

            Familia: <select  name="object">
                <?php
                if ($result->rowCount()) {

                    while ($fila = $result->fetch()) {
                        echo "<option value='$fila->cod'";
                        if (isset($_POST['enviar']) && $_POST['object'] == $fila->cod) {
                            echo 'selected';
                        }
                        echo ">$fila->nombre</option><br>";
                    }
                }
                ?>

            </select>
            <input type="submit" name="enviar" value="Mostrar Productos">
<!--            <input type="hidden" name="object2" value=" <?php if (isset($_POST['enviar']) && $_POST['object']) echo $_POST['object']; ?>"-->
        </form>        
        <?php
        if (isset($_POST["enviar"])) {
            try {

                $result = $conex->query("SELECT * FROM producto WHERE familia='$_POST[object]'");

                if ($result->rowCount()) {
                    echo "<h1>Productos de la familia</h1><br><form action='editar.php' method='POST'>";
                    while ($fila = $result->fetch()) {

                        echo "Producto " . $fila->cod . " " . $fila->nombre_corto . " $" . $fila->pvp . "<input type='hidden' name='searchValue' value='$fila->cod'><input type='submit' name='enviar2' value='Editar'><br><br>";
                    }
                    echo"</form>";
                } else {
                    echo "<h1>No hay productos de esta familia</h1><br>";
                }
            } catch (Exception $ex) {

                echo $ex->getMessage();
            }
        }
        ?>



    </body>
</html>
