<html>
    <head>
        <title>title</title>
    </head>
    <body>

        <?php
        // echo $_POST['nombre']." ".$_POST['apell'];
        $nameExists = false;
        $apellExists = false;
        $moduloSelected = false;

        if (isset($_POST["enviar"])) {



            if ($_POST["nombre"] == "Pepe") {
                $nameExists = true;
            } else
                $nameExists = false;

            if (!empty($_POST["apell"])) {
                $apellExists = true;
            } else
                $apellExists = false;

            if (isset($_POST["modulos"])) {
                $moduloSelected = true;
            } else
                $moduloSelected = false;
        }



        if (isset($_POST["enviar"]) && $nameExists && $apellExists && $moduloSelected) {

            echo $_REQUEST["nombre"] . " " . $_REQUEST["apell"] . "<br>";
            echo "modulos: <br>";
            foreach ($_POST["modulos"] as $value) {
                echo $value . "<br>";
            }
        } else {
            ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                Nombre: <input type="text" name="nombre" value="<?php if ($nameExists) echo $_POST['nombre']; ?>"><br>
                <?php
                if (!$nameExists && (isset($_POST["enviar"])))
                    echo "<span style='color: red'>Se ha equivocado de nombre</span><br>";
                ?>
                Apellidos: <input type="text" name="apell" value="<?php if ($apellExists) echo $_POST['nombre']; ?>"><br>
    <?php if (!$apellExists && (isset($_POST["enviar"]))) echo "<span style='color: red'>Falta un apellido</span><br>"; ?>
                Modulos: <br>
                <input type="checkbox" name="modulos[]" value="DWES" 
                    <?php if (isset($_POST["modulos"]) && in_array("DWES", $_POST["modulos"])) echo 'checked'; ?>
                       >Desarrollo Web Entorno Servidor</input><br>
                <input type="checkbox" name="modulos[]" value="DWEC" <?php if (isset($_POST["modulos"]) && in_array("DWEC", $_POST["modulos"])) echo 'checked'; ?>>Desarrollo Web Entorno Cliente</input><br>
                <input type="checkbox" name="modulos[]" value="DIW"<?php if (isset($_POST["modulos"]) && in_array("DIW", $_POST["modulos"])) echo 'checked'; ?>>Desarrollo Interfaces Web<br>
                <input type="submit" name="enviar" value='Enviar'>
            </form>   
    <?php
}
?>
    </body>
</html>
