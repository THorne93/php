<?php
$annio = 2024;

if ($annio % 4 == 0) {
    if ($annio % 100 == 0) {
        if ($annio % 400 == 0) {
            echo "Es un año bisiesto";
        } else {
            echo "No es un año bisiesto";
        }
    } else {
        echo "Es un año bisiesto";
    }
} else {
    echo "No es un año bisiesto";
}
?>
<html>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            border: solid black;
            margin: 0;
        }
    </style>
    <body>

        <table>
            <?php
            $rows = 10;
            $columns = 10;

            for ($i = 0; $i < $rows; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $columns; $j++) {
                    $number = ((rand(1, 50)) * 2) - 1;
                    echo "<td>" . $number . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>

    </body>
</html>


<?php
$A = 69;
$B = 420;
$C = 123;

echo "entre " . $A . ", " . $B . " y " . $C . ", ";

if ($A > $B && $A > $C) {
    echo $A . " es lo más grande";
} elseif ($B > $A && $B > $C) {
    echo $B . " es lo más grande";
} elseif ($C > $A && $C > $B) {
    echo $C . " es lo más grande";
}
?>


<html>
    <head>
        <style>
            table {
                border-collapse: collapse;
            }
            td {
                border: solid black;
                margin: 0;
            }
        </style>

    </head>
    <body>

        <table>
            <?php
            for ($i = 0; $i < 35; $i++) {
                for ($rows = 0; $rows < 5; $rows++) {
                    echo "<tr>";
                    for ($columns = 0; $columns < 7; $columns++) {

                        echo "<td>" . $i . "</td>";
                        $i++;
                    }
                    echo "</tr>";
                }
            }
            ?>

        </table>
        <?php
        include 'cabecera.php';
        require_once 'functions.php';
        
        
        ?>
        Here will be the function
        <?php
        $sal = 1000;
        $ret = 2;
        $com=100;
        echo "el salario es: ".salario_bruto($sal, $ret, $com);
        include 'cabecera.php';
        ?>
    </body>
</html>

