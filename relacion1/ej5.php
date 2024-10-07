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
            
            $i = 1;
            $rows = 0;
            $colums = 0;
            
            while ($i < 36) {
                while ($rows < 5) {
                    echo "<tr>";
                    while ($colums < 7) {
                        echo "<td>" . $i . "</td>";
                        $i++;
                    }
                    echo "</tr>";
                }
            }
            
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

    </body>
</html>