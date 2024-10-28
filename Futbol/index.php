<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <?php
        if (isset($_GET["status"])) {
            if ($_GET["status"] == "insert") {
                echo "<br>Registro insertado correctamente<br>";
            }
            if ($_GET["status"] == "borrar") {
                echo "<br>Registro borrado correctamente<br>";
            }
            if ($_GET["status"] == "modificar") {
                echo "<br>Registro modificado correctamente<br>";
            }
        }
        ?>
        <a href="introducir.php">1. Introducir Datos</a><br>
        <a href="mostrar.php">2. Mostrar Datos</a><br>
        <a href="buscar.php">3. Buscar</a><br>
        <a href="modificar.php">4. Modificar</a><br>
        <a href="borrar.php">5. Borrrar</a><br>
    </body>
</html>
