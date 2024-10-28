<html>
    <head>
        <title>title</title>
    </head>
    <style>
        h1 {
            margin-bottom:0;
        }
        form {
            background-color:#ddf0a4;
        }
        #contenido {
            background-color:#EEEEEE;
            height:600px;
        }
        #pie {
            background-color:#ddf0a4;
            color:#ff0000;
            height:30px;
        }
    </style>
    <body>
        <?php
        try {
            $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
            $conex->set_charset("utf8mb4"); // $conex->autocommit(false);
            $conex->server_info;
            // $conex->autocommit(false); NOOOOOOOOOOOOOOOOOOOOOOOOOOO
            $conex->server_info;
            $result = $conex->query("SELECT * FROM marketing");
            if ($result->num_rows){
                while ($fila=$result->fetch_object()){
                    echo $fila->Nombre."<br>";
                }
//            if ($result->num_rows){
//                $fila=$result->fetch_array();
//                echo $fila["Nombre"]."-".$fila[1];
//                echo"<br>";
//            }
//            if ($result->num_rows) {
//                $fila = $result->fetch_array();
//                echo $fila["Nombre"] . "-" . $fila[1]."<br>";
//                $fila = $result->fetch_array();
//                echo $fila["Nombre"] . "-" . $fila[1]."<br>";
//                $result->data_seek(0); //go back to beginning
//                $fila = $result->fetch_array();
//                echo $fila["Nombre"] . "-" . $fila[1]."<br>";
//            } else {
//            if ($result->num_rows) {
//                $fila = $result->fetch_assoc();
//                echo $fila["Nombre"] . "-" . $fila[1]."<br>";
//                $fila = $result->fetch_row();
//                echo $fila["Nombre"] . "-" . $fila[1]."<br>";
//                $result->data_seek(0); //go back to beginning
//                $fila = $result->fetch_row();
//                echo $fila["Nombre"] . "-" . $fila[1]."<br>";
            } else {
                echo "no hay ningun registro en la BD";
            }
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
        ?>
    </body>
</html>
