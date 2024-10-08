<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        if (!isset($_POST["siguente"]) && !isset($_POST["siguente2"])) {
            ?>    
            <form action="" method="POST">
                Nombre: <input type="text" name="nombre"><br>
                Apellidos: <input type="text" name="apell"><br>
                Idiomas:<br> <input type="checkbox" name="idiomas[]" value="Inglés">Ingles<br>
                <input type="checkbox" name="idiomas[]" value="frances">Francés<br>
                <input type="checkbox" name="idiomas[]" value="aleman">Alemán<br>
                <input type="submit" name="siguente" value="Siguente">
            </form>
            <?php
        }
        if (isset($_POST["siguente"])) {
            ?>
            <form action="" method="POST">
                Nº matricula: <input type="text" name="matricula"><br>
                Curso: <input type="text" name="curso"><br>
                Precio: <input type="text" name="precio"><br>
                <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"]; ?>">
                <input type="hidden" name="apell" value="<?php echo $_POST["apell"]; ?>">
                <input type="hidden" name="idiomas" value="<?php echo implode(";", $_POST["idiomas"]); ?>">
                <input type="submit" name="siguente2" value="Siguente">
            </form>
            <?php
        }
        if (isset($_POST["siguente2"])) {
            echo "Nombre: " . $_POST["nombre"] . "<br>";
            echo "Apellido: " . $_POST["apell"] . "<br>";
            echo "Idiomas: ".$_POST["idiomas"]."<br>";
            
            echo "Nº Matricula: " . $_POST["matricula"] . "<br>";
            echo "Curso: " . $_POST["curso"] . "<br>";
            echo "Precio: " . $_POST["precio"] . "<br>";
        }
        ?>

    </body>
</html>

