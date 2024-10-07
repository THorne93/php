<html>
    <head>
        <title>title</title>
        <style>
            table {
                border-collapse: collapse;
            }
            td {
                border: solid black;
                margin: 0;

            }
            th {
                border: solid black;
                margin: 0;
                padding: 10px;
                background-color: buttonshadow;

            }
        </style>
    </style>
</head>



<body>
    <table>
        <tr>
            <th>Indice</th>
            <th>Valor</th>
        </tr>
        <?php
        // var_dump($_SERVER);

        foreach ($_SERVER as $key => $value) {
        echo "<tr><td>" . $key . "</td>" . "<td>" . $value . "</td></tr>";
        }
        ?>
    </table>

    <table>
        
        <?php
        $matriz3 = array(
        "Contabilidad" => array("Nombre" => "Pepe", "Apellido" => "Lopez", "Salario" => 2100, "Edad" => 35),
        "Marqueting" => array("Nombre" => "Juan", "Apellido" => "Rodriguez", "Salario" => 2220, "Edad" => 41),
        "Ventas" => array("Nombre" => "Maria", "Apellido" => "Sanchez", "Salario" => 2315, "Edad" => 38),
        "Administracion" => array("Nombre" => "Susana", "Apellido" => "Ramirez", "Salario" => 1850, "Edad" => 53),
        "Direccion" => array("Nombre" => "Rosa", "Apellido" => "Capri Sun", "Salario" => 3550, "Edad" => 58),
        );
        
        echo "<tr><th></th>";
        foreach ($matriz3["Marqueting"] as $indC => $col) {
            echo "<th>".$indC."</th>";
        }
        
        foreach ($matriz3 as $indF => $fila) {
        echo "<tr><td>".$indF."</td>";

            foreach ($fila as $indC => $value) {
            echo "<td>".$value."</td>";
                }
                echo "</tr>";
        }
        ?>
    </table>





</body>
</html>



