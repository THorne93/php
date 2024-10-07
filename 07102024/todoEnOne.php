<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        if (!isset($_POST["siguente"]) && !isset($_POST["siguente2"])) {
            ?>   

            <form action"" method="POST">
                Nombre:<input type="text" name="nombre"> <?php if (isset($_POST["cancelar"])) echo "value='".$_POST['nombre']."'"; ?>
                Apellido:<input type="text" name="apell">
                <input type="submit" value="Siguente" name="siguente">
            </form>
            <?php
        }
        ?>

        <?php
        if (isset($_POST["siguente"]) && !isset($_POST["siguente2"])) {
            ?>
            <form action="" method="POST">
                Dirección<input type="text" name="direccion">
                Numero de tarjeta<input type="text" name="numero">
                <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"]; ?> ">
                <input type="hidden" name="apell" value="<?php echo $_POST["apell"]; ?> ">
                <input type="submit" value="Siguente" name="siguente2">

            </form>
            <?php
        }
        ?>
        <?php
        if (isset($_POST["siguente2"])) {
            echo "nombre: " . $_POST["nombre"]."<br>";
            echo "apellido: " . $_POST["apell"]."<br>";
            echo "direccion: " . $_POST["direccion"]."<br>";
            echo "nº tarjeta: " . $_POST["numero"];
        }
        ?>
        <form action="" method="POST">
            <input type="submit" name="confirmar" value="Confirmar">
            <input type="submit" name="cancelar" value="Cancelar">
        </form>


    </body>
</html>
