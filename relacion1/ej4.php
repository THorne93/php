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
            for ($i = 1; $i < 36; $i++) {
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

    </body>
</html>