<html>
    <head>
        <title>title</title>
    </head>
    <body>

        <?php
        // echo $_POST['nombre']." ".$_POST['apell'];
        if (isset($_POST["enviar"])) {
            if (!empty($_POST["nombre"]) && !empty($_POST["apell"]) && isset($_POST["modulos"])) {

                echo $_REQUEST["nombre"] . " " . $_REQUEST["apell"] . "<br>";
                echo "modulos: <br>";
                foreach ($_POST["modulos"] as $value) {
                    echo $value . "<br>";
                }
                echo "<br><a href='datos.php'>Introducir otro</a>";
            } else {
                ?>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    Nombre: <input type="text" name="nombre" ><br>
                    <?php if (empty($_POST["nombre"])) echo "<span style='color: red'>El nombre no puede estar vacio</span><br>"; ?>
                    Apellidos: <input type="text" name="apell" ><br>
                    <?php if (empty($_POST["apell"])) echo "<span style='color: red'>El apellido no puede estar vacio</span><br>"; ?>
                    Modulos: <br>
                    <input type="checkbox" name="modulos[]" value="DWES" <?php if(isset($_POST["modulos"])&& in_array("DWES", $_POST["modulos"])) echo 'checked'; ?>>Desarrollo Web Entorno Servidor</input><br>
                    <input type="checkbox" name="modulos[]" value="DWEC" <?php if(isset($_POST["modulos"])&& in_array("DWEC", $_POST["modulos"])) echo 'checked'; ?>>Desarrollo Web Entorno Cliente</input><br>
                    <input type="checkbox" name="modulos[]" value="DIW"<?php if(isset($_POST["modulos"])&& in_array("DIW", $_POST["modulos"])) echo 'checked'; ?>>Desarrollo Interfaces Web<br>
                    <input type="submit" name="enviar" value='Enviar'>
                </form>   
                <?php
            }
        } else {
            ?>
           <form action = "" method = "POST">
                Nombre: <input type = "text" name = "nombre"><br>
                Apellidos: <input type = "text" name = "apell"><br>
                Modulos: <br>
                    <input type="checkbox" name="modulos[]" value="DWES" >Desarrollo Web Entorno Servidor<br>
                    <input type="checkbox" name="modulos[]" value="DWEC">Desarrollo Web Entorno Cliente<br>
                    <input type="checkbox" name="modulos[]" value="DIW">Desarrollo Interfaces Web<br>
                    <input type="submit" name="enviar" value='Enviar'>
            </form>
               <a href = "procesa.php?nombre=Pepe">Ir a procesa</a>
          
            <?php
    }
        ?>
    </body>
</html>
