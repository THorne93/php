<?php if (isset($_GET['msg'])): ?>
        <h3 style="color: red;"><?php echo $_GET['msg']; ?></h3>
<?php endif; ?>


<html>
    <head>
        <title>Listado de productos de una familia</title>
        <style>
            h1 {
                margin-bottom:0;
            }
            #familia {
                background-color:#ddf0a4;
                padding-bottom: 5px;
                padding-left: 10px;
            }
            #productos {
                background-color:#EEEEEE;
                height:400px;
            }
            #pie {
                background-color:#ddf0a4;
                color:#ff0000;
                height:30px;
            }
        </style>
    </head>
    <body>
        <?php
        try {
            $conex = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');  //PUEDO AÑADIR OPCIONES. 
            $result = $conex->query("SELECT * FROM familia");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die("No se puede conectar a la BBDD");
        }
        ?>
        <div id="familia">
            <h1>Listado de productos de una familia</h1>
            <form action="" method="POST">
                <h2>Familia:</h2>
                <select name="familia">
                    <?php
                    $selectedFam = isset($_POST['familia']) ? $_POST['familia'] : '';
                    try {
                        while ($fila = $result->fetchObject()) {
                            $selected = ($fila->cod == $selectedFam) ? 'selected' : '';
                            echo "<option value='$fila->cod' $selected>$fila->nombre</option>";
                        }
                    } catch (Exception $ex) {
                        die($ex->getMessage());
                    }
                    ?>
                </select>
                <input type="submit" name="mostrar" value="Mostrar Producto">
            </form>
        </div>
        <?php
        if (isset($_POST['mostrar'])) {

            echo "<div id='productos'>";
            echo "<h2>Productos de la familia:</h2>";
            try {
                $product_result = $conex->prepare("SELECT * FROM producto WHERE familia = ?");  //para hacer bind.. pon prepare, no query.. desastre.
                $product_result->bindParam(1, $_POST['familia']);
                $product_result->execute();

                if ($product_result->rowCount()) {
                    echo "<table border='1'>
                                <tr>
                                    <th>Nombre</th>
                                    <th>PVP</th>
                                    <th> -- </th>
                                </tr>";    
     
                    while ($row = $product_result->fetchObject()) {
                        echo "<tr>
                                <td>".$row->nombre_corto."</td>".    //tal como viene en la base. cod. nombre_corto.. PVP, etc.
                                "<td>".$row->PVP."</td>
                                <td><form action='editar.php' method='POST'><input type='hidden' name='codigo' value='".$row->cod."'><input type='submit' name='editar' value='Editar'></form></td>
                              </tr>";            
                    }
                }
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            echo "</div>";
        }
        
        ?>
    </body>
</html>