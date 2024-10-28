<html>
    <head>
        <title>title</title>
    </head>
    <body>

        <?php
        // echo $_POST['nombre']." ".$_POST['apell'];
        $nameExists = false;
        $apellExists = false;
        $sexExists = false;
        $correctAge = false;
        $correctEstado = false;

        if (isset($_POST["enviar"])) {

            if (!empty($_POST["nombre"])) {
                $nameExists = true;
            }

            if (!empty($_POST["apell"])) {
                $apellExists = true;
            }

            if (!empty($_POST["sexo"])) {
                $sexExists = true;
            }

            if (!empty($_POST["edad"]) && $_POST["edad"] > 18) {
                $correctAge = true;
            }

            if ($_POST["estadocivil"] != "wrong") {
                $correctEstado = true;
            }
            
                        if (!empty($_POST["sexo"])) {
                $sexExists = true;
            }
        }



        if (isset($_POST["enviar"]) && $nameExists && $apellExists && $moduloSelected) {

            echo $_REQUEST["nombre"] . " " . $_REQUEST["apell"] . "<br>";
            echo "modulos: <br>";
            foreach ($_POST["modulos"] as $value) {
                echo $value . "<br>";
            }
        } else {
            ?>

            <form style="encabezado" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                Nombre: <input type="text" name="nombre" value="<?php if ($nameExists) echo $_POST['nombre']; ?>">
                <?php
                if (isset($_POST["enviar"]) && !$nameExists)
                    echo "<span style='color:red'>El nombre no puede ser vacio</span>";
                ?>

                <br><br>
                Apellidos: <input type="text" name="apell" value="<?php if ($apellExists) echo $_POST['apell']; ?>">
                <?php
                if (isset($_POST["enviar"]) && !$apellExists)
                    echo "<span style='color:red'>El apellido no puede ser vacio</span>";
                ?>


                <br><br>Sexo: 
                <input type="radio" name="sexo" value="hombre" 
                       <?php if (isset($_POST["sexo"]) && $_POST["sexo"] == "hombre") echo 'checked'; ?>>Hombre</input>
                <input type="radio" name="sexo" value="mujer"
                       <?php if (isset($_POST["sexo"]) && $_POST["sexo"] == "mujer") echo 'checked'; ?>>Mujer</input>

                <?php
                if (isset($_POST["enviar"]) && !$sexExists)
                    echo "<span style='color:red'>Tienes que seleccionar un sexo</span>";
                ?>


                <br><br>Edad <input type="text" name="edad" value="<?php if ($correctAge) echo $_POST['edad']; ?>">
                <?php
                if (isset($_POST["enviar"]) && !$correctAge)
                    echo "<span style='color:red'>La edad tiene que ser mayor de 18</span>";
                ?>

                <br><br>

                <label>Estado civil:</label> <select name="estadocivil">
                    <option value="wrong"  >Seleccione uno</option>


                    <option value="soltero"  
                    <?php
                    if (isset($_POST["enviar"]) && $_POST["estadocivil"] == "soltero") {
                        echo ' selected';
                    }
                    ?>>Soltero</option>


                    <option value="casado" <?php
                    if (isset($_POST["enviar"]) && $_POST["estadocivil"] == "casado") {
                        echo ' selected';
                    }
                    ?>>Casado</option>


                    <option value="divorciado" <?php
                    if (isset($_POST["enviar"]) && $_POST["estadocivil"] == "divorciado") {
                        echo ' selected';
                    }
                    ?>>Divorciado</option>

                    <option value="pareja" <?php
                    if (isset($_POST["enviar"]) && $_POST["estadocivil"] == "pareja") {
                        echo ' selected';
                    }
                    ?>>Pareja de hecho</option>

                </select>

                <?php
                if (isset($_POST["enviar"]) && !$correctEstado)
                    echo "<span style='color:red'>Tienes que seleccionar otro!</span>";
                ?>
                <br><br>

                Aficciones: 
                <input type="checkbox" name="aficciones[]" value="cine">Cine</input>
                <input type="checkbox" name="aficciones[]" value="lectura">Lectura</input>
                <input type="checkbox" name="aficciones[]" value="tv">TV</input><br>
                <input type="checkbox" name="aficciones[]" value="deporte">Deporte</input>
                <input type="checkbox" name="aficciones[]" value="musica">Musica</input><br><br>

                <label>Estudios:</label> <select name="estudios[]" size="5" multiple>
                    <option name="estudios[]" value="eso">ESO</option>
                    <option name="estudios[]"  value="bach">Bachillerato</option>
                    <option name="estudios[]"  value="gm">CFGM</option>
                    <option name="estudios[]"  value="gs">CFGS</option>
                    <option name="estudios[]"  value="uni">Universidad</option>
                </select><br><br>
                <input type="submit" name="enviar" value='Enviar'>


            </form>   
            <?php
        }
        ?>
    </body>
</html>
