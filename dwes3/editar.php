<?php
try {
    $conex = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');
} catch (PDOException $ex) {
    echo $ex->getMessage();
}



if (isset($_POST['editar'])) {
    try {
        $result = $conex->query("SELECT * FROM producto WHERE cod = '$_POST[codigo]'");
        $fila = $result->fetchObject();  //RECUERDA SACAR SIEMPRE LA FILA O FILAS. DEL RESULT.
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    ?>

    <html>
        <head>
            <title>Edición de un producto</title>
        </head>
        <body>
            <h1>Edición de un producto</h1>
            <form action="" method="POST">
                <h3>Producto:</h3>
                <p>Nombre Corto: <input type="text" name="nombrecorto" value="<?php echo $fila->nombre_corto; ?>"></p>
                <p><label for="nom">Nombre: </label> 
                    <textarea id="nom" name="nombre" rows="3" cols="40"> <?php echo $fila->nombre; ?></textarea></p>
                <p><label for="desc">Descripción: </label> 
                    <textarea id="desc" name="descripcion" rows="5" cols="50"><?php echo $fila->descripcion; ?></textarea></p>
                <p>PVP: <input type="text" name="pvp" value="<?php echo $fila->PVP; ?>"></p> 

                <input type="hidden" name="cod" value="<?php echo $fila->cod; ?>">

                <input type="submit" name="actualizar" value="Actualizar">
                <a href="listado.php"><input type="button" name="cancelar" value="Cancelar"></a>
            </form>
        </body>
    </html>

    <?php
}

if (isset($_POST['actualizar'])) {
    try {
        //$conex = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');
        $conex->beginTransaction();

        //$reg.. uso reg como registro, porque no hay resultado(result) simplmente indica filas afectadas = 0, 1 o false.CUANDO SE USA CON EXEC 
        //POR ESO SE USARÍA EXEC, en vez de QUERY, pero uso prepare en este caso.
        $reg = $conex->prepare("UPDATE producto SET nombre_corto=:nomc, nombre=:nom, descripcion=:desc, PVP=:pvp WHERE cod=:codi");

        $reg->bindParam(":nomc", $_POST['nombrecorto']);
        $reg->bindParam(":nom", $_POST['nombre']);
        $reg->bindParam(":desc", $_POST['descripcion']);
        $reg->bindParam(":pvp", $_POST['pvp']);
        $reg->bindParam(":codi", $_POST['cod']);

        //si hay ?
        //reg->execute(array($var1, $var2, $var3, y así en el orden));
        $reg->execute(); //realiza la consulta preparada o tramite, pero no lo guarda.

        if ($reg->rowCount()==1) {
            $conex->commit(); //Confirmo los cambios.Los guarda.
            echo "modificado correctamente";
            //header("Location: listado.php?msg=Producto \"" . $_POST['cod'] . "\" modificado correctamente.");
            exit();
        } elseif ($reg === 0) {
            $conex->rollBack();
            echo "no se ha realizado la actualizacion porque no se encuentra";
        } else {
            $conex->rollBack();
            echo "error al realizar la actualizacion";
        }
    } catch (PDOException $ex) {
        $conex->rollBack();   //---> esto es si el servidor devuelve un error. entonces no hace el commit. pero si no se encuentra el producto, sí se hace un commit.
        echo "Error al actualizar el producto" . $ex->getMessage();
    }
}
?>