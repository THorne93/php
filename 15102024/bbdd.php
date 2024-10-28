<html>
    <head>
        <title>title</title>
    </head>
    <style>
        h1 {
            margin-bottom:0;
        }
        #encabezado {
            background-color:#ddf0a4;
        }
        #contenido {
            background-color:#EEEEEE;
            height:600px;
        }
        #pie {
            background-color:#ddf0a4;
            color:#ff0000;
            height:30px;
        }
    </style>
    <body>
        <?php
        if (isset($_POST["enviar"])) {
            try {
                $conex = new mysqli("localhost", "dwes", "abc123.", "dwes");
                $conex->set_charset("utf8mb4"); // $conex->autocommit(false);
                $conex->server_info;
                // $conex->autocommit(false); NOOOOOOOOOOOOOOOOOOOOOOOOOOO
                $conex->server_info;
            } catch (Exception $ex) {

                echo $ex->getMessage();
            }
            try {
                $check = $conex->query("SELECT count(*) FROM stock WHERE tienda = $_POST[origen] AND producto = '$_POST[code]';");
                $row = $check->fetch_row();
                
                $cantidad = $conex->query("SELECT unidades FROM stock WHERE tienda = $_POST[origen] AND producto = '$_POST[code]';");
                $cantidad2 = $cantidad->fetch_row();
                
                if ($cantidad2[0] >= $_POST["number"]) {
                    if ($row[0] == 1) {
                        if ($conex->query("UPDATE stock set unidades=unidades-$_POST[number] WHERE tienda=$_POST[origen] AND producto='$_POST[code]'")) {
                            $conex->query(("UPDATE stock set unidades=unidades+$_POST[number] WHERE tienda=$_POST[destino] AND producto='$_POST[code]'"));
                            $conex->commit();
                            echo "Registro actualizado correctamente";
                        }
                    } else
                        echo "hay errores en tienda / producto";
                } else
                    echo "la tienda de origen no tiene productos suficientes";
            } catch (Exception $ex) {
                $conex->rollback();
                echo $ex->getMessage();
            }
            $conex->close();
        }
        ?>

        <h1>Traspaso Stock</h1>
        <form action="" method="POST">
            Tienda Origen: <select type="many" name="origen">
                <option value="1">Central</option>
                <option value="2">Sucursal 1</option>
                <option value="3">Sucursal 2</option>
            </select><br>
            Tienda Destino: <select type="many" name="destino">
                <option value="1">Central</option>
                <option value="2">Sucursal 1</option>
                <option value="3">Sucursal 2</option>
            </select><br>
            Codigo producto: <input type="text" name="code"><br>
            Unidades: <input type="number" name="number"><br>
            <input type="submit" name="enviar" value="enviar">
        </form>
    </body>
</html>
