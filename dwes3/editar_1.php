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
            $result = $conex->query("SELECT * FROM producto where cod='$_POST[searchValue]'");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        ?>

        <h1>Edición de un producto</h1>
        <form  action="" method="POST">

            <h2>Producto</h2><br>
            <?php
            $fila = $result->fetch();
            echo "Codigo: <input type='text' readonly name='codigo' value=$fila->cod><br>";
            echo "Nombre: <input type='text'  name='nombre' value=$fila->nombre><br>";
            echo "Nombre Corto: <input type='text'  name='nombreCorto' value=$fila->nombre_corto><br>";
            echo "Descripción: <textarea name='desc' rows='20' cols='100' >$fila->descripcion</textarea><br>";
            echo "PVP: <input type='text'  name='pvp' value=$fila->pvp><br>";
            ?>

            </select>
            <input  type="submit" name="enviar" value="Actualizar">
            <a href="listado.php"><input type="button" value="Cancelar"></input></a>

        </form> 

        <?php
        if (isset($_POST["enviar"])) {
            try {
                
                $registro = $conex->exec("UPDATE producto SET nombre = '$_POST[nombre]', nombre_corto='$_POST[nombreCorto]',descripcion='$_POST[desc]',PVP=$_POST[pvp] WHERE cod='$_POST[codigo]'");
     
                if ($registro) {
                    header("Location: actualizar.php?status=success");
                    exit;
                } elseif ($registro === 0) {
                    echo "no se ha realizado la actualizacion porque no se encuentra";
                } else {
                    echo "error al realizar la actualizacion";
                }
            } catch (PDOException $ex) {
                echo $ex->getmessage();
            }
        }
        ?>
    </body>
</html>
