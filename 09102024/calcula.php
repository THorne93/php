<html>
    <head>
        <title>title</title>
    </head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <body>

        <?php
        require_once 'funciones.php';
        $hayErrores = true;
        $hayFilas = false;
        $hayColumnas = false;
        if (isset($_POST["enviar"])) {

            if (is_numeric($_POST["filas"]) && $_POST["filas"] > 0) {
                $hayFilas = true;
            } else
                $hayFilas = false;

            if (is_numeric($_POST["columnas"]) && $_POST["columnas"] > 0) {
                $hayColumnas = true;
            } else
                $hayColumnas = false;

            if ($hayFilas && $hayColumnas) {
                $hayErrores = false;
            } else
                $hayErrores = true;
        }

        if (!isset($_POST["enviar"]) || $hayErrores) {
            ?>    

            <?php
        }
        ?>
        <h1>Matriz a generar</h1>
        <form action="" method="POST">
            Filas: <input type = "number" name = "filas"></input><br>
            <?php
            if (!$hayFilas && (isset($_POST["enviar"])))
                echo "<span style='color: red'>TIENE QUE SER MAS DE 1</span><br>";
            ?>
            Columnas: <input type = "number" name = "columnas"</input><br>
            <?php
            if (!$hayColumnas && (isset($_POST["enviar"])))
                echo "<span style='color: red'>TIENE QUE SER MAS DE 1</span><br>";
            ?>
            <input type="hidden" name="name" value="<?php echo $_REQUEST["name"]; ?>"</input>

            <input type="submit" name="enviar" value='Enviar'>
        </form>
        <?php
        if (isset($_POST["enviar"]) && !$hayErrores) {

            $option = $_POST["name"];
            $filas = $_POST["filas"];
            $columnas = $_POST["columnas"];
            $m = createMatrix($filas, $columnas);
            showMatrix($m);

            if ($option == 1) {
                $a = sumarFilas2($m);

                foreach ($a as $key => $value) {
                    echo "La suma de la fila " . $key . " es: " . $value . "<br>";
                }
                readArray($a);
            }
            if ($option == 2) {
                $a = sumarColumnas($m);
                foreach ($a as $key => $value) {
                    echo "La suma de la columna " . $key . " es: " . $value . "<br>";
                }
            }
            if ($option == 3) {

                sumarTodasFilas($m);
                sumarTodasColumnas($m, $filas, $columnas);
            }
            if ($option == 4) {
                
            }
            if ($option == 5) {
                
            }
        }
        ?>
    </body>
</html>
