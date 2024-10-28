<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
       // error_reporting(0) dont show errors
        $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
        $driver = new mysqli_driver();
        $driver->report_mode= MYSQLI_REPORT_STRICT;
//         $conex->select_db("database");
        
        echo $conex->server_info;
        echo"<br>";
        
        echo $conex->thread_id;
        echo"<br>";
        phpinfo();
        ?>
    </body>
</html>
