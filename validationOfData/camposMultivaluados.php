<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="POST">
            DNI:<input type="text" name="dni"><br>
            Nombre:<input type="text" name="nombre"><br>
            Apellidos:<input type="text" name="apell"><br>
            Salario:<input type="text" name="sal"><br>
            Usuario:<input type="text" name="usu"><br>
            Password:<input type="text" name="pwd"><br>
            Idiomas:<br>
            <input type="checkbox" name="idiomas[]" value="1">Español<br>
            <input type="checkbox" name="idiomas[]" value="2">Inglés<br>
            <input type="checkbox" name="idiomas[]" value="4">Francés<br>
            <input type="checkbox" name="idiomas[]" value="8">Alemán<br>
            <input type="checkbox" name="idiomas[]" value="16">Chino<br>
            Estudios:<select multiple="" name="estudios[]">
                <option value="ESO">ESO</option>
                <option value="Bachillerato">Bachillerato</option>
                <option value="CFGM">CFGM</option>
                <option value="CFGS">CFGS</option>
            </select><br>
            <input type="submit" name="guardar" value="Guardar"><br>
            <input type="submit" name="recuperar" value="Recuperar">
        </form>
        <?php
        if (isset($_POST["guardar"])) {
            try {
                $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
                $conex->set_charset("utf8mb4");
                $idio = 0;
                foreach ($_POST["idiomas"] as $value) {
                    $idio += $value;
                }
                //   $idio = "Inglés,Alemán"; can also be added as a string
                $estud = implode("-", $_POST["estudios"]);

                $conex->query("INSERT INTO marketing VALUES('$_POST[dni]', '$_POST[nombre]', '$_POST[apell]', $_POST[sal], "
                        . "'$_POST[usu]', '$_POST[pwd]', $idio, '$estud')");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            echo "<br>Registro insertado correctamente<br>";
            $conex->close();
        }

        if (isset($_POST["recuperar"])) {
            try {
                $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
                $conex->set_charset("utf8mb4");
                $result = $conex->query("SELECT * FROM marketing");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            if ($result->num_rows) {
                while ($fila = $result->fetch_object()) {
                    echo "Nombre: " . $fila->Nombre . "<br>";
                    echo "Idiomas: " . $fila->idiomas . "<br>";
                    echo "Estudios: " . $fila->estudios . "<br>";
                    echo "--------------------------------------<br>";
                }
            } else
                echo"<br>No hay registros en la BBDD";
        }
        ?>
    </body>
</html>
