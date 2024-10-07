<html>
    <head>
        <title>title</title>
    </head>
    <body>
        
        <?php
        echo "nombre: " . $_POST["nombre"];
        echo "<br>";
        echo "apellido: " . $_POST["apell"];
        echo "<br>";
        echo "direccion: " . $_POST["direccion"];
        echo "<br>";
        echo "numero de tarjeta: " . $_POST["numero"];
        echo "<br>";
        ?>
        
        <form action="datos.php" method="POST">
            <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"]; ?> ">
            <input type="hidden" name="apell" value="<?php echo $_POST["apell"]; ?> ">
            <input type="hidden" name="direccion" value="<?php echo $_POST["direccion"]; ?> ">
            <input type="hidden" name="numero" value="<?php echo $_POST["numero"]; ?> ">


            <input type = "submit" name = "cancel" value = 'Cancelar'></input>
            <input type = "submit" name = "confirm" value = 'Confirmar'></input>
        </form>
        
    </body>
</html>
