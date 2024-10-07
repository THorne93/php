<html>
    <head>
        <title>title</title>
    </head>
    <body>

        <form action="confirmacion.php" method="POST">
            
            Dirección: <input type="text" name="direccion" 
                              value="<?php if ($_POST["cancel"] === "si") echo $_POST["direccion"]; ?> ">
            <br>
            Nº de tarjeta: <input type="text" name="numero" 
                                  value="<?php if ($_POST["cancel"] === "si") echo $_POST["numero"]; ?> ">
            <br>
            
            <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"]; ?> ">
            <input type="hidden" name="apell" value="<?php echo $_POST["apell"]; ?> ">
            <input type = "submit" name = "enviar" value = 'Siguente'></input>

        </form>
    </body>
</html>
