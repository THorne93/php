<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        if (isset($_POST["insert"])) {
            try {
                $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
                $conex->set_charset("utf8mb4");
                $conex->autocommit(false);
            } catch (Exception $ex) {
               
                die($ex->getMessage());
            }
            try {
                if ($conex->query("INSERT INTO marketing (DNI,Nombre,Apellidos,Salario) VALUES"
                                . " ('$_POST[dni]','$_POST[nombre]','$_POST[apellido]',$_POST[salario])")) {
                    echo "Registro insertado correctamente" . $conex->affected_rows;
                }
//                $conex->query("UPDATE marketing SET Salario=3000 WHERE DNI='11111111A'");
//                echo "<br>Actualizacion: " . $conex->affected_rows . "<br>";
                
                $conex->query("DELETE FROM marketing WHERE salario=2000");
                echo"<br>Borrado: ".$conex->affected_rows."<br>";
            } catch (Exception $ex) {
                if ($ex->getCode()==1062) echo "el dni ya existe";
                echo $ex->getMessage();
            }
            $conex->close();
        }
        ?>
        <br>
        <form action="" method="POST">
            DNI:<input type="text" name="dni"><br>
            Nombre:<input type="text" name="nombre"><br>
            Apellido:<input type="text" name="apellido"><br>
            Salario:<input type="text" name="salario"><br>
            <input type="submit" name="insert" value="Insertar">
        </form>
    </body>
</html>
