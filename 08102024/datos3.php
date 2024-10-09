<html>
    <head>
        <title>title</title>
    </head>
    <body>


        <?php
        if (!isset($_POST["enviar"]) && !isset($_POST["enviar2"])) {
            ?>    

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                Nombre: <input type="text" name="nombre">
                <?php
                if (isset($_POST["enviar"]) && !$nameExists)
                    echo "<span style='color:red'>El nombre no puede ser vacio</span>";
                ?>

                <br><br>
                Apellidos: <input type="text" name="apell">
                <?php
                if (isset($_POST["enviar"]) && !$apellExists)
                    echo "<span style='color:red'>El apellido no puede ser vacio</span>";
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
                    <option name="estudios[]"  value="bachillerato">Bachillerato</option>
                    <option name="estudios[]"  value="grado medio">CFGM</option>
                    <option name="estudios[]"  value="grado superior">CFGS</option>
                    <option name="estudios[]"  value="universidad">Universidad</option>
                </select><br><br>
                <input type="submit" name="enviar" value='Enviar'>


            </form>  
            <?php
        }
        ?>
        <?php
        if (isset($_POST["enviar"])) {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <br><br>Sexo:
                <input type = "radio" name = "sexo" value = "hombre">Hombre</input>
                <input type="radio" name="sexo" value="mujer">Mujer</input>

                <br><br>

                <label>Estado civil:</label> <select name="estadocivil">
                    <option value="wrong"  >Seleccione uno</option>
                    <option value="soltero">Soltero</option>
                    <option value="casado" >Casado</option>
                    <option value="divorciado" >Divorciado</option>
                    <option value="pareja">Pareja de hecho</option>

                </select>


                <br><br>

                Edad <input type="text" name="edad">

                <br><br>
                <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"]; ?> ">
                <input type="hidden" name="apell" value="<?php echo $_POST["apell"]; ?> ">
                <input type="hidden" name="aficciones" value="<?php echo implode(";", ($_POST["aficciones"])); ?> ">
                <input type="hidden" name="estudios" value="<?php echo implode(';', $_POST["estudios"]); ?> ">
                <input type="submit" name="enviar2" value='Enviar'>

            </form>
            <?php
        }
        if (isset($_POST["enviar2"])) {
            echo "nombre: " . $_POST["nombre"] . "<br>";
            echo "apellido: " . $_POST["apell"] . "<br>";
            echo "aficciones: " . "<br>";
            $af = explode(";", $_POST["aficciones"]);
            foreach ($af as $value) {
                echo $value . "<br>";
            }
            echo "estudios: " . "<br>";
            $es = explode(";", $_POST["estudios"]);
            foreach ($es as $value) {
                echo $value . "<br>";
            }
            echo "sexo: " . $_POST["sexo"] . "<br>";
            echo "estado civil: " . $_POST["estadocivil"] . "<br>";
            echo "edad: " . $_POST["edad"] . "<br>";
        }
        ?>

    </body>
</html>
