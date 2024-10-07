<html>
    <head>
        <title>title</title>
    </head>
    <body>


        <h2>Datos</h2>

        <form action ="pedido.php" method = "POST">
            Nombre: <input type = "text" name = "nombre" 
                           value="<?php if (isset($_POST["cancel"])) echo $_POST["nombre"] ?>">
            <br>

            Apellidos: <input type = "text" name = "apell" 
                              value="<?php if (isset($_POST["cancel"])) echo $_POST["apell"] ?>">
            <br>

            <input type="hidden" name="direccion" value="<?php if (isset($_POST["cancel"])) echo $_POST["direccion"]; ?> ">
            <input type="hidden" name="numero" value="<?php if (isset($_POST["cancel"])) echo $_POST["numero"]; ?> ">
            <input type="hidden" name="cancel" value="<?php if (isset($_POST["cancel"])) echo 'si'; ?>">


            <input type = "submit" name = "enviar" value = 'Siguente'></input>
        </form>


</html>
