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
            $a = [];
            $conex = new mysqli("localhost", "dwes", "abc123.", "dwes");
            $conex->set_charset("utf8mb4"); // $conex->autocommit(false);
            $conex->server_info;
            // $conex->autocommit(false); NOOOOOOOOOOOOOOOOOOOOOOOOOOO
            $conex->server_info;
            $result = $conex->query("SELECT * FROM producto");
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }

        $conex->close();
        ?>
        <h1>Stock En Tiendas</h1>
        <form  action="" method="POST">

            Productos: <select type="many" name="object">
                <?php
                if ($result->num_rows) {
                    while ($fila = $result->fetch_object()) {
                        echo "<option value='$fila->cod'";
                        if (isset($_POST['enviar']) && $_POST['object'] == $fila->cod)
                            echo 'selected';
                        echo ">$fila->nombre_corto</option><br>";
                    }
                }
                ?>

            </select>
            <input type="submit" name="enviar" value="Mostrar Stock">
<!--            <input type="hidden" name="object2" value="<?php if (isset($_POST['enviar']) && $_POST['object']) echo $_POST['object']; ?>"-->
            <?php
            if (isset($_POST["enviar"])) {


                try {
                    $conex = new mysqli("localhost", "dwes", "abc123.", "dwes");
                    $conex->set_charset("utf8mb4"); // $conex->autocommit(false);
                    $conex->server_info;
                    // $conex->autocommit(false); NOOOOOOOOOOOOOOOOOOOOOOOOOOO
                    $conex->server_info;
                    $result = $conex->query("SELECT * FROM producto");
                } catch (Exception $ex) {

                    echo $ex->getMessage();
                }
                try {
                    $resultTemp = $conex->query("SELECT * FROM tienda JOIN stock ON tienda.cod=stock.tienda where producto='$_POST[object]' AND cod=tienda;");
                    if ($resultTemp->num_rows) {
                        echo "<div>Stock del producto en las tiendas: ( " . $_POST["object"] . ")<br>";
                        while ($fila = $resultTemp->fetch_object()) {
                            $a[] = [$fila->nombre, $fila->unidades];
                            echo "Tienda: " . $fila->nombre . ": <input type='number' name='unidades2[]' value='" . $fila->unidades . "' > unidades <br>";
                            echo "<input type='hidden' name='tienda[]' value='[$fila->tienda,$_POST[object]]'>";
                        }
                        echo "<input type='submit' name='enviar2' value='Actualizar'>";

                        echo "</div>";
                    }
                } catch (Exception $ex) {
                    $conex->rollback();
                    echo $ex->getMessage();
                }
                try {
                    
                } catch (Exception $ex) {
                    $conex->rollback();
                    echo $ex->getMessage();
                }
            }
            if (isset($_POST["enviar2"])) {
                try {
                    $conex = new mysqli("localhost", "dwes", "abc123.", "dwes");
                    foreach ($_POST['tienda'] as $key => $tienda) {
                       
                        $tienda = str_replace(['[', ']'], '', $tienda);
                        list($tienda2, $object) = explode(',', $tienda);
                        
                        $numero = (int)$_POST["unidades2"][$key];
                        
                        $stmt = $conex->prepare("UPDATE stock SET unidades=$numero where tienda=? AND producto=?");
                        $stmt->bind_param("is", $tienda2, $object);
                        
                        if ($stmt->execute()) {
                            $conex->commit();
                        } else {
                            $conex->rollback();
                            echo "CREDENCIALES INCORRECTAS";
                        }
                    }

                    $conex->close();
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }

                echo "<br><div>STOCK ACTUALIZADO</div>";
            }
            ?>

        </form>



    </body>
</html>
